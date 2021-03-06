<?php
namespace Asgard\Behaviors;

class MetasBehavior extends \Asgard\Entity\Behavior {
	public function load(\Asgard\Entity\Definition $definition) {
		$definition->addProperty('meta_title', array('type' => 'string', 'required' => false));
		$definition->addProperty('meta_description', array('type' => 'string', 'required' => false));
		$definition->addProperty('meta_keywords', array('type' => 'string', 'required' => false));

	}

	public function call_showMetas(\Asgard\Entity\Entity $entity) {
		$container = $this->getContainer();
		$container['html']->setTitle($entity->meta_title!='' ? html_entity_decode($entity->meta_title):html_entity_decode($entity));
		$container['html']->setKeywords($entity->meta_keywords);
		$container['html']->setDescription($entity->meta_description);
	}
}