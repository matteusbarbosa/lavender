<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Lavender\Core\Database\Query\Builder;

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
                $table->increments('id');
                if($entity['timestamps']){
                    $table->timestamps();
                }
                if($entity['attributes'] && $entity['type'] == 'flat'){
                    foreach($entity['attributes'] as $code => $attribute){
                        switch($attribute['type']){
                            case 'text':
                                $table->longText($code);
                                break;
                            case 'int':
                                $table->integer($code);
                                break;
                            case 'decimal':
                                $table->decimal($code,12,4);
                                break;
                            case 'date':
                                $table->dateTime($code);
                                break;
                            default:
                                $table->string($code, 150);
                                break;
                        }
                    }
                }
            });
            if($entity['attributes'] && $entity['type'] == 'eav'){
                Schema::create($entity['table'].'_attribute', function($table){
                    $table->increments('id');
                    $table->string('code', 50);
                    $table->string('label', 50);
                    $table->string('type', 50);
                });
                Schema::create($entity['table'].'_attribute_text', function($table){
                    $table->increments('id');
                    $table->integer('entity_id')->unsigned();
                    $table->integer('attribute_id')->unsigned();
                    $table->longText('value');
                });
                Schema::create($entity['table'].'_attribute_int', function($table){
                    $table->increments('id');
                    $table->integer('entity_id')->unsigned();
                    $table->integer('attribute_id')->unsigned();
                    $table->integer('value');
                });
                Schema::create($entity['table'].'_attribute_decimal', function($table){
                    $table->increments('id');
                    $table->integer('entity_id')->unsigned();
                    $table->integer('attribute_id')->unsigned();
                    $table->decimal('value',12,4);
                });
                Schema::create($entity['table'].'_attribute_date', function($table){
                    $table->increments('id');
                    $table->integer('entity_id')->unsigned();
                    $table->integer('attribute_id')->unsigned();
                    $table->dateTime('value');
                });
                Schema::create($entity['table'].'_attribute_varchar', function($table){
                    $table->increments('id');
                    $table->integer('entity_id')->unsigned();
                    $table->integer('attribute_id')->unsigned();
                    $table->string('value', 50);
                });
                foreach($entity['attributes'] as $code => $attribute){
                    DB::table($entity['table'].'_attribute')->insert(
                        array(
                            'code' => $code,
                            'label' => $attribute['label'],
                            'type' => Builder::$attribute_types[$attribute['type']],
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
                Schema::drop($entity['table'].'_attribute_text');
                Schema::drop($entity['table'].'_attribute_int');
                Schema::drop($entity['table'].'_attribute_decimal');
                Schema::drop($entity['table'].'_attribute_date');
                Schema::drop($entity['table'].'_attribute_varchar');
            }
        }
	}

}
