<?php

return [
    'system_name' => 'Newbet',
    'system_powered' => '<a target="_blank" href="http://tastyigniter.com">Desarrollado por TastyIgniter</a>',
    'copyright' => 'Gracias por usar <a target="_blank" href="http://newbetinternational.com">Newbet</a>',
    'version' => '<b>Versión:</b> %s',

    'no_database' => [
        'label' => 'Error de base de datos Encontrado',
        'help' => 'Se requiere una conexión de base de datos. Compruebe que la base de datos está configurada y migrada correctamente antes de intentarlo de nuevo.',
    ],
    'required' => [
        'config' => "La configuración usada en %s debe proporcionar un valor '%s'.",
    ],
    'not_found' => [
        'model' => "El modelo ':name' no se encuentra.",
        'layout' => "No se encuentra el diseño ':name'.",
        'partial' => "No se encuentra el ':name parcial.",
        'config' => 'No se puede encontrar el archivo de configuración %s definido para %s.',
        'class' => "No se puede encontrar '%s' en %s",
        'combiner' => "No se puede encontrar los activos '%s'",
    ],
    'missing' => [
        'config_key' => 'Falta la clave requerida [%s] en %s',
        'carte_key' => 'No se encontró ninguna clave a la carta, haga clic en el botón a la carta para introducir una.',
    ],
    'error' => [
    ],

    'date' => [
        'today' => 'Hoy',
        'tomorrow' => 'Mañana',
        'yesterday' => 'Ayer',
        'full' => '%s a las %s',
    ],

    'php' => [
        'date_format' => 'd M Y',
        'date_format_short' => 'd M',
        'date_format_long' => 'l, jS F Y',
        'time_format' => 'H:i',
        'date_time_format' => 'd M Y H:i',
        'date_time_format_short' => 'd M H:i',
        'date_time_format_long' => 'l, jS F Y \a\t h:i',
    ],

    'moment' => [
        'date_format' => 'DD MMM YYYY',
        'date_format_short' => 'DD MMM',
        'date_format_long' => 'dddd, de MMM AAAA',
        'time_format' => 'HH:mm',
        'date_time_format' => 'DD MMMM AAAA HH:mm',
        'date_time_format_short' => 'DD MMM \a\t HH:mm',
        'date_time_format_long' => 'dddd, De MMMM YYYY \a\t HH:mm',
        'day_format' => 'ddd DD',
        'day_time_format' => 'ddd DD HH:mm',
        'day_time_format_short' => 'ddd HH:mm',
    ],

    'activities' => [
        'text_title' => 'Actividades',
        'button_mark_as_read' => 'Marcar todo como leído',
        'text_empty' => 'No hay ninguna actividad disponible.',
        'activity_system' => 'Sistema',
        'activity_self' => 'Usted',
        'activity_master_logged_in' => ' <b>ha iniciado sesión</b> como <b>:subject.first_name :subject.last_name</b>.',
    ],

    'countries' => [
        'text_title' => 'Países',
        'text_form_name' => 'País',
        'text_filter_search' => 'Buscar nombre o código.',
        'text_empty' => 'No se dispone de ningún país.',

        'column_iso_code2' => 'Código ISO 2',
        'column_iso_code3' => 'Código ISO 3',
        'column_status' => 'Estado',

        'label_priority' => 'Prioridad',
        'label_format' => 'Formato',
        'label_iso_code2' => 'Código ISO 2',
        'label_iso_code3' => 'Código ISO 3',

        'help_format' => 'Dirección 1 = {address_1}<br />Dirección 2 = {address_2}<br />Ciudad = {city}<br />Postcode = {postcode}<br />Estado = {state}<br />País = {country}',
        'help_iso' => 'Más información sobre <a target="_blank" href="http://en.wikipedia.org/wiki/ISO_3166-1">ISO Alpha 2 y 3</a>',
    ],

    'currencies' => [
        'text_title' => 'Monedas',
        'text_form_name' => 'Moneda',
        'text_filter_search' => 'Buscar nombre o código.',
        'text_empty' => 'No hay Monedas disponibles.',
        'text_right' => 'Derecha',
        'text_left' => 'Izquierda',

        'column_code' => 'Código',
        'column_country' => 'País',
        'column_symbol' => 'Símbolo',
        'column_rate' => 'Tarifa',
        'column_status' => 'Estados',

        'label_title' => 'Título',
        'label_code' => 'Código',
        'label_country' => 'País',
        'label_symbol' => 'Símbolo',
        'label_symbol_position' => 'Posición del símbolo',
        'label_rate' => 'Tarifa',
        'label_thousand_sign' => 'Separador de millares',
        'label_decimal_sign' => 'Punto decimal',
        'label_decimal_position' => 'Lugar decimal',

        'help_iso' => 'Más información sobre <a target="_blank" href="https://en.wikipedia.org/wiki/ISO_4217">ISO 4217</a>',
    ],

    'extensions' => [
        'text_title' => 'Extensiones',
        'text_delete_title' => 'Extensión: Eliminar',
        'text_filter_search' => 'Nombre descriptivo.',
        'text_empty' => 'No hay extensiones disponibles.',
        'text_installed' => 'Instalado',
        'text_uninstalled' => 'Desinstalados',
        'text_files' => 'archivos',
        'text_files_data' => 'archivos y datos',
        'text_settings' => 'Configuración',
        'text_author' => 'Autor',

        'button_browse' => '<i class="fa fa-globe"></i>&nbsp;&nbsp;Ver más extensiones',
        'button_check' => '<i class="fa fa-refresh"></i>&nbsp;&nbsp;Actualizaciones',
        'button_delete' => 'Eliminar',
        'button_payments' => 'Administrar pagos',
        'button_settings' => 'Administrar la configuración',
        'button_yes_delete' => 'Sí, eliminar',
        'button_return_to_list' => 'No, volver a la lista',

        'column_icon' => 'Ícono',
        'column_version' => 'Versión',

        'label_delete_data' => 'Borrar Datos',

        'error_config_no_found' => 'Se ha producido un error, el archivo de registro de extensión no se ha podido encontrar',

        'alert_info_layouts' => '<b>Diseño y componente(s) de página registrado</b>',
        'alert_warning_layouts' => 'Para mostrar el componente de esta extensión en una página, añada a un diseño <a href="%s" class="alert-link">aquí!</a>',
        'alert_delete_warning' => 'Usted está a punto de borrar el %s de extensión <b>%s</b>',
        'alert_delete_confirm' => '¿Está seguro que desea eliminar estos %s? Esto no se puede deshacer!',
        'alert_is_installed' => '. Debe desinstalar una extensión antes de eliminar.',
        'alert_setting_missing_id' => 'El código de configuración de extensión no se ha especificado.',
        'alert_setting_not_found' => 'No se encontró la configuración de extensión.',
        'alert_setting_model_missing' => 'Falta el modelo de configuración.',
        'alert_setting_model_not_found' => 'No se encontró el modelo de configuración de extensión [%s].',
    ],

    'languages' => [
        'text_title' => 'Idiomas',
        'text_form_name' => 'Idioma',
        'text_tab_general' => 'Detalles',
        'text_tab_files' => 'Traducciones',
        'text_tab_edit_file' => 'Editar traducciones',
        'text_filter_search' => 'Buscar por nombre.',
        'text_filter_file' => 'Ver las %s traducciones',
        'text_filter_translations' => 'Filtrar traducciones.',
        'text_empty' => 'No hay idiomas disponibles.',
        'text_empty_translations' => 'No hay reservas disponibles.',
        'text_files' => 'archivos',
        'text_locale_strings' => 'Cadenas locales (%s%% traducidas, %s cadenas)',

        'column_code' => 'Código',
        'column_status' => 'Estado',
        'column_variable' => 'Texto de origen (inglés)',
        'column_language' => 'Texto de traducción (%s)',

        'label_code' => 'Código de módulo',
        'label_image' => 'Ícono',
        'label_idiom' => 'Idioma',

        'button_new' => 'Nuevo grupo',

        'help_language' => 'Utilice un código regional completo (por ejemplo, “fr_FR”) en lugar de un código de idioma genérico (por ejemplo, “fr”), debe ser el mismo que el directorio local.',

        'alert_save_changes' => 'Sus cambios se perderán si no los guardas antes de editar otro archivo de idioma.',

        'translations' => [

            'label_file' => 'Archivo local',
            'label_search' => 'Buscar',

            'help_no_files' => 'No se encontraron traducciones coincidentes para este idioma. Debe instalar un paquete de idioma.',
        ],
    ],

    'mail_templates' => [
        'text_title' => 'Diseño de correo',
        'text_form_name' => 'Diseño de correo',
        'text_template_title' => 'Plantillas de correo',
        'text_new_template_title' => 'Plantilla de correo: Nueva',
        'text_edit_template_title' => 'Plantilla de correo: Actualizar',
        'text_preview_template_title' => 'Plantilla de correo: Vista previa',
        'text_partial_title' => 'Partes de Correo',
        'text_partial_form_name' => 'Correo parcial',
        'text_new_partial_title' => 'Correo Parcial: Nuevo',
        'text_edit_partial_title' => 'Correo Parcial: Nuevo',
        'text_preview_partial_title' => 'Correo Parcial: Vista previa',
        'text_templates' => 'Plantillas',
        'text_layouts' => 'Diseños',
        'text_partials' => 'Parciales',
        'text_empty' => 'No hay temas disponibles.',
        'text_variables' => 'Variables',
        'text_registration' => 'Correo electrónico de registro al cliente',
        'text_password_reset_request' => 'Solicitud de restablecimiento de contraseña al cliente',
        'text_password_reset_request_alert' => 'Solicitud de restablecimiento de contraseña a admin',
        'text_password_reset' => 'Email de restablecimiento de contraseña par el cliente',
        'text_password_reset_alert' => 'Email de restablecimiento de contraseña para el admin',
        'text_order' => 'Email de pedido al cliente',
        'text_reservation' => 'Email de reserva al cliente',
        'text_internal' => 'Mensaje interno',
        'text_contact' => 'Email de contacto para admin',
        'text_registration_alert' => 'Email de alerta de registro al administrador',
        'text_order_alert' => 'Email de alerta de pedido a admin',
        'text_reservation_alert' => 'Alerta de reserva al administrador',
        'text_order_update' => 'Email de actualización del estado del pedido para el cliente',
        'text_reservation_update' => 'Email de actualización del estado de la reserva para el cliente',

        'button_test_message' => 'Enviar mensaje de prueba',

        'column_code' => 'Código',
        'column_title' => 'Título',
        'column_layout' => 'Diseño',
        'column_status' => 'Estado',

        'label_language' => 'Idioma',
        'label_code' => 'Código',
        'label_subject' => 'Asunto',
        'label_layout' => 'Diseño',
        'label_layout_css' => 'Diseño CSS',
        'label_body' => 'HTML',
        'label_markdown' => 'Markdown',
        'label_plain' => 'Text Plano',

        'help_variables' => 'Arrastra estas variables al área de contenido:',

        'alert_test_message_sent' => 'Mensaje de prueba enviado con éxito a %s',
    ],

    'mail_variables' => [
        'text_group_global' => 'Variables Globales',
        'text_site_name' => 'Nombre del Sitio',
        'text_site_logo' => 'Logo del sitio',

        'text_group_customer' => 'Variables personalizadas',
        'text_first_name' => 'Nombre del cliente',
        'text_last_name' => 'Apellido del cliente',
        'text_email' => 'Dirección de correo electrónico del cliente',
        'text_telephone' => 'Dirección telefónica del cliente',

        'text_group_staff_reset' => 'Variables de restablecimiento de contraseña del personal',
        'text_staff_name' => 'Nombre del personal',
        'text_staff_reset_link' => 'URL para restablecer la contraseña del personal',

        'text_group_registration' => 'Variables de registro',
        'text_account_login_link' => 'URL de inicio de sesión',

        'text_group_reset' => 'Variables de restablecimiento de contraseña',
        'text_reset_code' => 'Código de restablecimiento de contraseña',
        'text_reset_link' => 'URL de restablecimiento de contraseña',

        'text_group_order' => 'Variables de pedido',
        'text_order_number' => 'Número de pedido',
        'text_customer_name' => 'Nombre completo del cliente',
        'text_order_type' => 'Tipo de pedido ej. entrega/recogida',
        'text_order_time' => 'Tiempo de entrega/recogida del pedido',
        'text_order_date' => 'Fecha de entrega/recogida del pedido',
        'text_order_added' => 'Fecha de creación del pedido',
        'text_order_payment' => 'Método de pago de pedido',
        'text_order_address' => 'Dirección del cliente para el pedido de entrega',
        'text_invoice_number' => 'Dirección telefónica del cliente',
        'text_invoice_date' => 'Dirección telefónica del cliente',
        'text_order_menus' => 'Conjunto de elementos del menú de pedidos',
        'text_order_comment' => 'Comentario del pedido',
        'text_location_name' => 'Nombre de ubicación',
        'text_location_email' => 'Email de ubicación',
        'text_location_address' => 'Dirección de ubicación',
        'text_order_view_url' => 'URL de vista de pedido',
        'text_order_totals' => 'Matriz de totales de órdenes',
        'text_menu_name' => 'Nombre del menú del pedido',
        'text_menu_quantity' => 'Cantidad de menú de pedido',
        'text_menu_price' => 'Precio del menú de pedido',
        'text_menu_subtotal' => 'Subtotal del menú de pedido',
        'text_menu_options' => 'Opción de menú de pedido ej. nombre: precio',
        'text_menu_comment' => 'Comentario del menú de pedido',
        'text_order_total_title' => 'Título total del pedido',
        'text_order_total_value' => 'Valor total del pedido',
        'text_priority' => 'Prioridad total del pedido',

        'text_group_reservation' => 'Variables de reserva',
        'text_reservation_number' => 'Número de reserva',
        'text_reservation_date' => 'Fecha de reserva',
        'text_reservation_time' => 'Hora de la reserva',
        'text_reservation_guest_no' => 'Número de Comensales reservados',
        'text_reservation_comment' => 'Comentario de reserva',
        'text_reservation_view_url' => 'URL de vista de reserva',

        'text_status_name' => 'Nombre de estado',
        'text_status_comment' => 'Comentario de estado',

        'text_group_contact' => 'Variables de contacto',
        'text_full_name' => 'Nombre completo del contacto',
        'text_contact_email' => 'Correo electrónico de contacto',
        'text_contact_telephone' => 'Teléfono de contacto',
        'text_contact_topic' => 'Tema de contacto',
        'text_contact_message' => 'Cuerpo del mensaje de contacto',

    ],

    'permissions' => [
        'name' => 'Sistema',
        'activities' => 'Actividades recientes',
        'countries' => 'Creación, edición y eliminación de países.',
        'currencies' => 'Creación, edición y eliminación de monedas.',
        'system_logs' => 'Ver registros de sistema y peticiones',
        'extensions' => 'Instalar, desinstalar y eliminar la extensión',
        'mail_templates' => 'Crear, editar y eliminar plantillas de correo',
        'languages' => 'Crear, editar y eliminar idiomas del sitio',
        'settings' => 'Administrar ajustes del sistema',
        'updates' => 'Posibilidad de aplicar actualizaciones cuando una nueva versión de TastyIgniter está disponible',
    ],

    'request_logs' => [
        'text_title' => 'Registros de Solicitud',
        'text_form_name' => 'Registro de Solicitud',
        'text_filter_search' => 'Buscar por nombre.',
        'text_empty' => 'No hay registros de solicitudes disponibles.',
        'text_empty_referrer' => 'No hay referencias a esta URL.',

        'column_status_code' => 'Código de estado',
        'column_url' => 'Url solicitada',
        'column_count' => 'Contador',

        'label_url' => 'Url solicitada',
        'label_referer' => 'Referente',
    ],

    'settings' => [
        'text_title' => 'Configuraciones',
        'text_edit_title' => 'Ajustes: %s',
        'text_tab_general' => 'General',
        'text_tab_restaurant' => 'Restaurante',
        'text_tab_mail' => 'Correo',
        'text_tab_server' => 'Avanzado',

        'text_tab_desc_general' => 'Cambie su nombre de restaurante, correo electrónico y url, idioma por defecto, moneda y formato de fecha, ...',
        'text_tab_desc_mail' => 'Configuración para enviar correos electrónicos',
        'text_tab_desc_server' => 'Administrar ajustes avanzados del sistema como activar/desactivar el mantenimiento.',

        'text_tab_site' => 'Sitio',
        'text_tab_title_maps' => 'Geolocalización',
        'text_tab_title_date_time' => 'Fecha / Hora',
        'text_tab_title_currency' => 'Moneda',
        'text_tab_title_language' => 'Idioma',
        'text_tab_title_taxation' => 'Impuesto',
        'text_tab_title_invoice' => 'Facturación',
        'text_tab_title_order' => 'Pedido',
        'text_tab_title_reservation' => 'Reservas',
        'text_tab_title_maintenance' => 'Mantenimiento',
        'text_tab_title_system_log' => 'Configuración de registro',
        'text_tab_title_activity_log' => 'Ajustes de registro de actividad',
        'text_single' => 'Único',
        'text_multiple' => 'Múltiples',
        'text_1_hour' => '1 hora',
        'text_3_hours' => '3 horas',
        'text_6_hours' => '6 horas',
        'text_12_hours' => '12 horas',
        'text_24_hours' => '24 horas',
        'text_3_days' => '3 Días',
        'text_5_days' => '5 días',
        'text_1_week' => '1 semana',
        'text_auto' => 'Automáticamente',
        'text_manual' => 'Manualmente',
        'text_miles' => 'Millas',
        'text_kilometers' => 'Kilómetros',
        'text_chain_geocoder' => 'Cadena (recomendado)',
        'text_google_geocoder' => 'Utilizar Google Geocoding',
        'text_nominatim' => 'Nominatim de OpenStreetMap',
        'text_plain' => 'Texto plano',
        'text_html' => 'HTML',
        'text_sendmail' => 'Sendmail',
        'text_smtp' => 'SMTP',
        'text_log_file' => 'Archivo de registro',
        'text_mailgun' => 'Mailgun',
        'text_postmark' => 'Postmark (requiere la extensión de controladores de terceros)',
        'text_ses' => 'SES',
        'text_mail_no_encryption' => 'Sin cifrado',
        'text_mail_tls_encryption' => 'TLS',
        'text_mail_ssl_encryption' => 'SSL',
        'text_to_customer' => 'Al cliente',
        'text_to_admin' => 'A restaurante',
        'text_to_location' => 'A la ubicación',
        'text_send_test_email' => 'Enviar Email de Prueba',
        'text_internal_sequence_prefix' => 'Prefijo más secuencia de numeración interna',
        'text_menu_price_include_tax' => 'Los precios del menú ya incluyen impuestos',
        'text_apply_tax_on_menu_price' => 'Aplicar impuesto sobre mi precio de menú',
        'text_openexchangerates' => 'Abrir tipos de cambio',
        'text_fixerio' => 'Fixer.io',

        'label_site_name' => 'Nombre del restaurante',
        'label_site_email' => 'Email del Restaurante',
        'label_site_logo' => 'Logo del restaurante',
        'label_timezone' => 'Zona horaria por defecto',
        'label_site_currency' => 'Moneda por defecto',
        'label_currency_converter' => 'Convertidor de divisas por defecto',
        'label_currency_converter_oer_api_key' => 'App ID del convertidor de monedas (Open Exchange Rates API)',
        'label_currency_converter_fixer_api_key' => 'ID de la aplicación Convertidor de Moneda (Fixer.io API)',
        'label_currency_refresh_interval' => 'Intervalo de Actualización de Tasas',
        'label_detect_language' => 'Detectar idioma del navegador',
        'label_site_language' => 'Idioma por defecto',
        'label_customer_group' => 'Grupo de clientes',
        'label_country' => 'País',
        'label_maps_api_key' => 'Clave API de Google Maps',
        'label_distance_unit' => 'Unidad de distancia',
        'label_default_geocoder' => 'Geocodificador por defecto',
        'label_tax_mode' => 'Modo impuesto',
        'label_tax_title' => 'Título de impuestos',
        'label_tax_percentage' => 'Tasa de Impuesto',
        'label_tax_menu_price' => 'Precio de impuestos del menú',
        'label_tax_delivery_charge' => 'Carga de entrega de impuestos',
        'label_default_order_status' => 'Estado por defecto del pedido',
        'label_processing_order_status' => 'Procesando estado del pedido',
        'label_completed_order_status' => 'Estado del pedido completado',
        'label_canceled_order_status' => 'Estado del pedido de cancelación',
        'label_menus_page' => 'Página de elementos del menú',
        'label_guest_order' => 'Permitir pedidos invitados',
        'label_location_order' => 'Rechazar pedidos fuera del área de entrega',
        'label_invoice_prefix' => 'Prefijo de factura',
        'label_default_reservation_status' => 'Estado de reserva por defecto',
        'label_confirmed_reservation_status' => 'Estado de reserva confirmado',
        'label_canceled_reservation_status' => 'Estado de reserva cancelado',
        'label_media_max_size' => 'Tamaño máximo de archivo',
        'label_media_thumb_height' => 'Altura de miniatura',
        'label_media_thumb_width' => 'Ancho de miniatura',
        'label_media_uploads' => 'Subidas',
        'label_media_new_folder' => 'Nueva carpeta',
        'label_media_copy' => 'Copiar',
        'label_media_move' => 'Mover',
        'label_media_rename' => 'Renombrar',
        'label_media_delete' => 'Eliminar',
        'label_media_transliteration' => 'Transcripción',
        'label_allow_registration' => 'Permitir registro de clientes',
        'label_registration_email' => 'Enviar Email de Registro',
        'label_order_email' => 'Enviar confirmación de pedido/Alerta Email',
        'label_reservation_email' => 'Enviar confirmación de reserva/email de alerta',
        'label_sender_name' => 'Nombre del remitente',
        'label_sender_email' => 'Email del remitente',
        'label_protocol' => 'Protocolo de correo',
        'label_sendmail_path' => 'Ruta de envío',
        'label_smtp_host' => 'Host SMTP',
        'label_smtp_port' => 'Puerto SMTP',
        'label_smtp_user' => 'Nombre de usuario SMTP',
        'label_smtp_pass' => 'Contraseña SMTP',
        'label_smtp_encryption' => 'Protocolo de cifrado',
        'label_test_email' => 'Prueba de email',
        'label_mailgun_domain' => 'Dominio de Mailgun',
        'label_mailgun_secret' => 'Secreto de Mailgun',
        'label_postmark_token' => 'Token de Postmark',
        'label_ses_key' => 'Clave SES',
        'label_ses_secret' => 'Secreto SES',
        'label_ses_region' => 'Región SES',
        'label_permalink' => 'Enlace permanente',
        'label_enable_request_log' => 'Registrar solicitudes incorrectas',
        'label_maintenance_mode' => 'Modo de mantenimiento',
        'label_maintenance_message' => 'Mensaje de mantenimiento',
        'label_activity_log_timeout' => 'Limpiar registro de actividad más antiguo que',

        'alert_email_sending' => 'Enviando correo...',
        'alert_email_sent' => 'Email enviado a %s',
        'alert_settings_missing_model' => 'Falta el modelo definido %s.',
        'alert_settings_not_found' => 'Configuración %s no encontrada.',
        'alert_settings_errors' => 'Haga clic para arreglar los elementos necesarios.',
        'alert_delete_setup_files' => '¡<b>¡ADVERTENCIA DE SECURIDAD!</b> Elimina los archivos de configuración para impedir que otra persona sobreescriba tu sitio.',

        'help_timezone' => 'La zona horaria por defecto. Elija una ciudad en la misma zona horaria que su restaurante.',
        'help_detect_language' => 'Activar o desactivar la detección de idioma del navegador de usuario. Si está habilitado, su sitio será traducido al idioma del navegador.',
        'help_maps_api_key' => 'Se requiere una clave API para utilizar Google Maps y/o Geocodificación. <a target="_blank" href="https://developers.google.com/maps/documentation/javascript/get-api-key#get-an-api-key">¿Dónde puedo encontrar mi clave API de Google Maps?</a> Habilita la API de Geocodificación de Google Maps y la API JavaScript de Google Maps en tu cuenta de Google Developer',
        'help_default_geocoder' => 'Dígale al sistema qué servicio geocodificador usar cuando las direcciones de geocodificación. \'Cadena\' es un geocodificador especial que ejecuta Google y el geocodificador open street maps y se detiene una vez que obtiene una respuesta válida.',
        'help_site_currency' => 'Habilitar más monedas desde Localización > Monedas.',
        'help_currency_converter_oer_api' => 'Puedes <a target="_blank" href="https://openexchangerates.org/signup/">registrarte aquí</a> para tu API de tipos de cambio abiertos.',
        'help_currency_converter_fixer_api' => 'Puedes <a target="_blank" href="https://fixer.io/signup/">registrarte aquí</a> en tu API de Fixer.io.',
        'help_special_category' => 'Seleccione qué categoría utilizar automáticamente para menús especiales',
        'help_tax_mode' => 'Establecer si activar o desactivar el cálculo de impuestos en la tienda',
        'help_tax_title' => 'Introduzca el título de impuestos como debe mostrarse en la tienda. Ej. IVA',
        'help_tax_percentage' => 'Introduzca el porcentaje para calcular impuestos. Ej. 15',
        'help_tax_menu_price' => 'Establecer si el precio del menú ya incluye impuestos o impuestos debe calcularse en el precio del menú',
        'help_tax_delivery_charge' => 'Establecer si el cargo de entrega es gravable',
        'help_default_location' => 'Elija o añada una nueva ubicación para establecer como su ubicación principal/por defecto del restaurante.',
        'help_default_order_status' => 'Seleccione el estado del pedido por defecto cuando se coloca/recibe un nuevo pedido',
        'help_processing_order_status' => 'Seleccione el estado del pedido que debe alcanzar un pedido antes de que el pedido comience a reducir el stock',
        'help_completed_order_status' => 'Seleccione el estado del pedido para marcar un pedido como completado antes de que se cree la factura del pedido y un cliente puede dejar la revisión',
        'help_canceled_order_status' => 'Seleccione el estado del pedido cuando un pedido está marcado como cancelado o sospechoso de actividad fraudulenta',
        'help_menus_page' => 'Elija una página para mostrar sus elementos de menú',
        'help_guest_order' => 'Permitir al cliente realizar un pedido sin crear una cuenta.',
        'help_location_order' => 'Si está deshabilitado, el cliente podrá pedir sin entrar en su código postal.',
        'help_invoice_prefix' => 'Establecer el prefijo de la factura (por ejemplo, <b>INV-2015-00</b>1123). Dejar en blanco para no usar ningún prefijo. Las siguientes macros están disponibles: {year} {month} {day} {hour} {minute} {second}',
        'help_default_reservation_status' => 'Seleccione el estado de reserva por defecto cuando se reciba una nueva reserva',
        'help_canceled_reservation_status' => 'Seleccione el estado de la reserva cuando una reserva está marcada como cancelada o sospechosa de actividad fraudulenta',
        'help_confirmed_reservation_status' => 'Seleccione el estado de la reserva para marcar una reserva como confirmada antes de que la mesa esté reservada',
        'help_delete_thumbs' => 'Esto eliminará las Miniaturas creadas. Nota: las miniaturas se crean automáticamente.',
        'help_media_max_size' => 'El límite de tamaño máximo (en kilobytes) para cargar un archivo.',
        'help_media_upload' => 'Activar o desactivar la carga de archivos',
        'help_media_new_folder' => 'Activar o desactivar la creación de carpeta',
        'help_media_copy' => 'Activar o desactivar la copia de archivos/carpetas',
        'help_media_move' => 'Habilitar o deshabilitar movimiento de archivo/carpeta',
        'help_media_rename' => 'Activar o desactivar el cambio de nombre de archivo/carpeta',
        'help_media_delete' => 'Activar o desactivar eliminar archivos/carpetas',
        'help_sendmail_path' => 'Por favor especifique la ruta de envio.',
        'help_allow_registration' => 'Si esto está deshabilitado los clientes sólo pueden ser creados por los administradores.',
        'help_registration_email' => 'Enviar un correo de confirmación al correo electrónico del cliente o administración después de registrar la cuenta con éxito',
        'help_order_email' => 'Enviar un correo de confirmación al cliente, administración y ubicación después de ingresar un nuevo Pedido',
        'help_reservation_email' => 'Enviar un correo de confirmación al correo electrónico al cliente, administración y localización cuando se recibe una nueva reserva',
        'help_enable_request_log' => 'Si se registra o no una solicitud de navegador incorrecta, como errores 404.',
        'help_maintenance' => 'Activar para evitar que los clientes vean su tienda. El mensaje de mantenimiento se mostrará a los clientes excepto al administrador registrado.',
        'help_activity_log_timeout' => 'Eliminar todas las actividades registradas anteriores al número de días especificado',
    ],

    'system_logs' => [
        'text_title' => 'Registros de Sistema',

        'button_empty' => '<i class="fa fa-eraser"></i>&nbsp;&nbsp;Registros vacíos',
        'button_request_logs' => '<i class="fa fa-globe"></i>&nbsp;&nbsp;Registros de Solicitud',
    ],

    'themes' => [
        'text_title' => 'Temas',
        'text_edit_title' => 'Tema: Personalizar',
        'text_source_title' => 'Tema: Editar plantilla',
        'text_delete_title' => 'Tema: Borrar',
        'text_form_name' => 'Tema',
        'text_tab_customize' => 'Personalizar',
        'text_tab_markup' => 'Marcar',
        'text_tab_php_section' => 'Sección PHP',
        'text_tab_meta' => 'Meta',
        'text_tab_components' => 'Componentes',
        'text_empty' => 'No hay temas disponibles.',
        'text_select_file' => 'Seleccione una plantilla de [%s] para editar',
        'text_is_default' => 'Activado',
        'text_set_default' => 'Activado',
        'text_author' => 'por',
        'text_version' => 'Versión',
        'text_theme_is_active' => '. No puede eliminar un tema activo.',
        'text_files' => 'archivos',
        'text_files_data' => 'archivos y datos',
        'text_locked_child' => 'Tema bloqueado: crear un tema descendiente',

        'label_code' => 'Código',
        'label_template' => 'Plantilla',
        'label_file' => 'Nombre de archivo de plantilla',
        'label_title' => 'Título',
        'label_layout' => 'Diseño',
        'label_permalink' => 'Permalink',
        'label_component' => 'Componente',
        'label_component_alias' => 'Alias de componentes',
        'label_component_status' => 'Estado del componente',
        'label_delete_data' => 'Eliminar datos',
        'label_copy_data' => 'Copiar datos',
        'label_type_page' => 'Páginas',
        'label_type_partial' => 'Parciales',
        'label_type_layout' => 'Diseños',
        'label_type_content' => 'Contenido',

        'button_browse' => '<i class="fa fa-globe"></i>&nbsp;&nbsp;Ver más temas',
        'button_source' => '<i class="fa fa-file"></i>&nbsp;&nbsp;Editar archivos de plantilla',
        'button_check' => '<i class="fa fa-refresh"></i>&nbsp;&nbsp;Actualizaciones',
        'button_customize' => '<i class="fa fa-paint-brush"></i>&nbsp;&nbsp;Personalizar',
        'button_child' => '<i class="fa fa-child"></i>&nbsp;&nbsp;Crear tema secundario',
        'button_choose' => 'Elegir',
        'button_new_source' => 'Nuevo %s',
        'button_rename_source' => 'Renombrar %s',
        'button_delete_source' => 'Eliminar %s',
        'button_delete' => 'Eliminar',
        'button_yes_delete' => 'Sí, eliminar',
        'button_yes_copy' => 'Sí, copiar',
        'button_return_to_list' => 'No, volver a la lista',

        'help_components' => 'Renderiza el componente en un diseño o página agregando <code>@component(&#x27;componentAlias&#x27;)</code> al marcador. Más información <a href="https://tastyigniter.com/docs/master/customize/components">aquí</a>.',

        'error_config_no_found' => 'Se ha producido un error, el archivo de registro del tema no se ha podido encontrar',
        'error_theme_exists' => 'el tema ya existe',

        'alert_delete_warning' => 'Estás a punto de eliminar el %s del tema <b>%s</b>',
        'alert_delete_confirm' => '¿Está seguro que desea eliminar estos %s? Esto no se puede deshacer!',
        'alert_theme_locked' => 'Este es un tema bloqueado, los cambios están restringidos, crear un tema secundario para hacer cambios.',
        'alert_theme_path_locked' => 'Esta plantilla pertenece a un tema bloqueado, estas acciones están restringidas.',
        'alert_changes_confirm' => 'Versiones conflictivas, el archivo de plantilla ha cambiado. Recarga la página para continuar.',
    ],

    'updates' => [
        'text_title' => 'Actualizaciones',
        'text_browse_title' => 'Navegar %s',

        'text_title_carte' => 'Tu Carré',

        'text_tab_title_extensions' => 'Extensiones',
        'text_tab_title_themes' => 'Temas',
        'text_ignore' => 'Ignorar',
        'text_search' => 'Buscar en el mercado para %s para instalar',
        'text_popular_title' => 'Recomendado %s',
        'text_last_checked' => '. <b>Última comprobación:</b> %s',

        'text_no_updates' => 'No hay actualizaciones disponibles.',

        'text_update_found' => '%s actualización(es) disponibles',
        'text_update_ignored' => '%s actualización(s) ignorada',
        'text_item_update_summary' => 'Actualizar de la versión %s a <b>%s</b>',

        'text_maintenance_mode' => 'Mientras su sitio está siendo actualizado, el modo de mantenimiento se activará y se desactivará tan pronto como sus actualizaciones estén completadas.',

        'progress_download' => '<i class="fa fa-cloud-download fa-fw"></i>&nbsp;&nbsp;&nbsp;Descargando %s&#8230;',
        'progress_extract' => '<i class="fa fa-file-archive-o fa-fw"></i>&nbsp;&nbsp;&nbsp;Extrayendo %s&#8230;',
        'progress_complete' => '<i class="fa fa-download fa-fw"></i>&nbsp;&nbsp;&nbsp;Finalizando la instalación&#8230;',

        'label_meta_code' => 'Meta Código',
        'label_meta_type' => 'Meta Tipo',
        'label_meta_version' => 'Meta versión',
        'label_meta_hash' => 'Meta Hash',
        'label_meta_description' => 'Meta descripción',
        'label_meta_step' => 'Meta paso',
        'label_meta_action' => 'Meta acción',
        'label_meta_items' => 'Meta elementos',

        'progress_success' => '<i class="fa fa-check fa-fw"></i>&nbsp;&nbsp;&nbsp;Terminó %s %s con éxito.&#8230;',
        'progress_update' => '<strong id="progress-updating">Actualizando %s&#8230;</strong>',
        'progress_enable_maintenance' => 'Activando modo de mantenimiento&#8230;',
        'progress_disable_maintenance' => 'Restauración/desactivar modo mantenimiento &#8230;',

        'button_browse' => '<i class="fa fa-globe"></i>&nbsp;&nbsp;Navegar %s',
        'button_carte' => '<i class="fa fa-key"></i>&nbsp;&nbsp;Carta',
        'button_check' => '<i class="fa fa-refresh"></i>&nbsp;&nbsp;Comprobar de nuevo',
        'button_updates' => '<i class="fa fa-refresh"></i>&nbsp;&nbsp;Actualizaciones',
        'button_update' => '<i class="fa fa-check"></i>&nbsp;&nbsp;Actualizar',

        'help_carte_key' => 'Se requiere una clave de Carte para añadir/actualizar el elemento del mercado de TastyIgniter. Obtén uno creando un sitio desde tu <a href="%s" target="_blank">cuenta TastyIgniter</a>, si todavía no lo has hecho.',
    ],
];

