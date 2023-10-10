<?php
defined('_JEXEC') or die;

class PlgSystemSeoMetaTags extends JPlugin
{
    public function onBeforeRender()
    {
        // Obtener el documento y la aplicación
        $doc = JFactory::getDocument();
        $app = JFactory::getApplication();
        $uri = JUri::getInstance();

        // Asegurarse de que solo se modifique el frontend
        if ($app->isClient('site')) {
            // Agregar la etiqueta canonical basada en la URL actual
            $canonicalUrl = $uri->toString(array('scheme', 'host', 'port', 'path', 'query'));
            $doc->addHeadLink($canonicalUrl, 'canonical', 'rel');

            // Agregar la etiqueta robots
            $robotsContent = 'index, follow'; // Modifica según tus necesidades
            $doc->setMetaData('robots', $robotsContent);
        }
    }
}
