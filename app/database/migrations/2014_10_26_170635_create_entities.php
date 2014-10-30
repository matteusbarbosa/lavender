<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntities extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

        foreach(\Lavender::allEntityConfig() as $identifier => $entity){
            Schema::create($entity['table'], function($table) use ($entity){
                $table->engine = 'InnoDB';
                $table->increments('id');
                if($entity['timestamps']){
                    $table->timestamps();
                }
                if($entity['attributes'] && $entity['type'] == 'flat'){
                    foreach($entity['attributes'] as $column => $attribute){
                        $this->addColumn($table, $attribute['type'], $column);
                    }
                }
            });
            if($entity['attributes'] && $entity['type'] == 'eav'){
                Schema::create($entity['table'].'_attribute', function($table){
                    $table->engine = 'InnoDB';
                    $table->increments('id');
                    $table->string('code', 50);
                    $table->string('label', 50);
                    $table->string('type', 50);
                });
                $eav = Config::get('defaults.eav');
                foreach($eav as $type){
                    Schema::create($entity['table'].'_attribute_'.$type, function($table) use ($type){
                        $table->engine = 'InnoDB';
                        $table->increments('id');
                        $table->integer('entity_id')->unsigned();
                        $table->index('entity_id');
                        $table->integer('attribute_id')->unsigned();
                        $table->index('attribute_id');
                        $this->addColumn($table, $type, 'value');
                    });
                    Schema::table($entity['table'].'_attribute_'.$type, function($table) use ($entity){
                        $table->foreign('entity_id')->references('id')->on($entity['table'])->onDelete('cascade');
                        $table->foreign('attribute_id')->references('id')->on($entity['table'].'_attribute')->onDelete('cascade');
                    });
                }
                foreach($entity['attributes'] as $code => $attribute){
                    DB::table($entity['table'].'_attribute')->insert(
                        array(
                            'code' => $code,
                            'label' => $attribute['label'],
                            'type' => array_search($attribute['type'], $eav),
                        )
                    );
                }
            }
            if($entity['defaults']){
                foreach($entity['defaults'] as $default){
                    $model = \Lavender::entity($identifier, $default);
                    $model->save();
                }
            }
        }

	}

    protected function addColumn(&$table, $type, $column)
    {
        switch($type){
            case 'text':
                $table->longText($column);
                break;
            case 'int':
                $table->integer($column);
                break;
            case 'decimal':
                $table->decimal($column, 12, 4);
                break;
            case 'date':
                $table->dateTime($column);
                break;
            default:
                $table->string($column, 150);
                break;
        }
    }

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        foreach(\Lavender::allEntityConfig() as $identifier => $entity){
            Schema::drop($entity['table']);
            if($entity['attributes'] && $entity['type'] == 'eav'){
                Schema::drop($entity['table'].'_attribute');
                foreach(Config::get('defaults.eav') as $type){
                    Schema::drop($entity['table'].'_attribute_'.$type);
                }
            }
        }
	}

}
