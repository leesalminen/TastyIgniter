<?php

return [
    'text_title' => 'Webhooks',
    'text_tab_general' => 'Configuración',
    'text_tab_setup' => 'Instrucciones de configuración',
    'text_outgoing' => 'Webhooks salientes',
    'text_success' => '<span class="text-success">Éxito</span>',
    'text_failed' => '<span class="text-danger">Error</span>',

    'label_enable_authentication' => 'Habilitar autentificación',
    'label_server_signature_header' => 'Nombre de cabecera de la firma Webhook',
    'label_headers' => 'Encabezados HTTP adicionales',
    'label_timeout_in_seconds' => 'Tiempo de espera de Webhook',
    'label_tries' => 'Intentos de Webhook',
    'label_verify_ssl' => 'Verificar certificado SSL',

    'help_enable_authentication' => 'Autenticar peticiones de webhook salientes que requieren autenticación.',
    'help_server_signature_header' => 'El nombre de clave de la cabecera HTTP de donde se añadirá la firma para las solicitudes salientes.',
    'help_headers' => 'Añadir cabeceras para ser añadido a todas las peticiones de webhook salientes',
    'help_timeout_in_seconds' => 'El número de segundos que se tardarán en enviar un webhook antes de ceder.',
    'help_tries' => 'El número de veces para intentar enviar un webhook antes de rendirse.',
    'help_verify_ssl' => 'Verificar si el certificado SSL del destino del webhook es válido.',

    'outgoing' => [
        'text_title' => 'Webhooks',
        'text_form_name' => 'Conector web',
        'text_tab_deliveries' => 'Envíos Recientes',
        'text_empty' => 'No hay webhooks disponibles.',

        'label_url' => 'Url Payload',
        'label_content_type' => 'Tipo de contenido',
        'label_verify_ssl' => 'Verificar SSL',
        'label_secret' => 'Firma secreta',
        'label_events' => 'Eventos',
        'label_events_setup' => 'Seleccione un evento para ver las instrucciones de configuración',
        'label_message' => 'Mensaje',
        'label_event_code' => 'Código de evento',

        'column_url' => 'Url Payload',

        'help_url' => 'Especifique la URL para recibir las solicitudes POST de webhook.',
        'help_content_type' => 'Especifique el tipo de contenido a usar al entregar payloads.',
        'help_secret' => 'Establezca un webhook secreto para proteger sus solicitudes POST de webhook. Cuando lo cree, déjelo en blanco para generar uno automáticamente.',
        'help_verify_ssl' => 'Verificar o no certificados SSL al entregar payloads',
        'help_events' => '¿Qué eventos te gustaría que desencadenasen este webhook?',
    ],

    'automation' => [
        'label_webhooks' => 'Webhooks',
        'label_url' => 'Url',
        'label_signature' => 'Clave de Firma',

        'help_webhooks' => 'Los webhooks le permiten configurar integraciones, que se activan cuando ciertos eventos ocurren dentro de TastyIgniter. Cuando se activa un evento, se envía un payload HTTP POST a la URL del webhook. Los Webhooks pueden ser usados para enviar nuevos pedidos a su POS.',
        'help_url' => 'Una solicitud POST será enviada a la URL con detalles de los eventos suscritos. El formato de datos será JSON',
    ],
];
