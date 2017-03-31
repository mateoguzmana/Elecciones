<?php

class JMessage
{
	static function getTranslation($event)
	{
		$text = "Lenguaje: {$event->language} <br>";
		$text .= "Categoria: {$event->category} <br>";
		$text .= "Mensage: {$event->message} <br>";
		mail('micorreo@gmail.com', 'Necesito traduccion', $text);
	}
}
