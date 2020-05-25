<?php

namespace App\EventSubscriber\Form;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\Validator\Constraints\NotBlank;

class PropositionsFormSubscriber implements EventSubscriberInterface
{
	public static function getSubscribedEvents()
	{
		
		return [
			FormEvents::POST_SET_DATA => 'postSetData'
		];
	}

	public function postSetData(FormEvent $event):void
	{
		
		$data = $event->getData();
		$form = $event->getForm();
		$model = $form->getData();

	}
}