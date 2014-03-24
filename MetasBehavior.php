<?php
namespace Asgard\Behaviors;

class MetasBehavior implements \Asgard\Core\Behavior {
	public static function load($entityDefinition, $params=null) {
		$entityDefinition->addProperty('meta_title', array('type' => 'text', 'required' => false));
		$entityDefinition->addProperty('meta_description', array('type' => 'text', 'required' => false));
		$entityDefinition->addProperty('meta_keywords', array('type' => 'text', 'required' => false));

		#$article->showMetas()
		$entityDefinition->addMethod('showMetas', function($entity) {
			\Asgard\Core\App::get('html')->setTitle($entity->meta_title!='' ? html_entity_decode($entity->meta_title):html_entity_decode($entity));
			\Asgard\Core\App::get('html')->setKeywords($entity->meta_keywords);
			\Asgard\Core\App::get('html')->setDescription($entity->meta_description);
		});
	}
}