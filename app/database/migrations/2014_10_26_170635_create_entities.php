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
        $config = Config::get('entity');
        $foreign_keys = array();

        foreach($config as $identifier => $entity){
            Schema::create($entity['table'], function($table) use ($entity){
                $table->engine = 'InnoDB';
                $table->increments('id');
                if($entity['timestamps']){
                    $table->timestamps();
                }
                if($entity['attributes'] && $entity['type'] == Lavender::ENTITY_TYPE_FLAT){
                    foreach($entity['attributes'] as $column => $attribute){
                        $this->addColumn($table, $attribute['type'], $column);
                        if(isset($attribute['parent']) && $attribute['parent']){
                            $foreign_keys[] = array(
                                'table' =>  $table,
                                'col' => $column,
                                'ref_table' => $attribute['parent'],
                                'ref_col' => 'id',
                            );
                        }
                    }
                }
            });
            if($entity['attributes'] && $entity['type'] == Lavender::ENTITY_TYPE_EAV){
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
        }
        foreach($foreign_keys as $foreign_key){
            $foreign_key['table']->foreign($foreign_key['col'])
                ->references($foreign_key['ref_col'])
                ->on($config[$foreign_key['ref_table']]['table'])
                ->onDelete('cascade');
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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $config = Config::get('entity');
        foreach($config as $identifier => $entity){
            if($entity['attributes'] && $entity['type'] == Lavender::ENTITY_TYPE_EAV){
                foreach(Config::get('defaults.eav') as $type){
                    Schema::drop($entity['table'].'_attribute_'.$type);
                }
                Schema::drop($entity['table'].'_attribute');
            }
            Schema::drop($entity['table']);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}

}
