<?php

/**
 * 
 * - Работет на основе плагина yoast
 * 
 * Для подключения определенной разметки необходимо
 * определить соответствующую константу
 * 
 * Возможные константы:
 * - VSEO_PAGE_ABOUT - страница о нас
 * - VSEO_PAGE_SERVICES - архив услуг
 * - VSEO_SINGLE_SERVICE - страница отдельной услуги
 * 
 * примерc подключения:
 * define('VSEO_SINGLE_SERVICE', true); 
 * .... код страницы
 * 
 */






class Vnet_Seo
{


  function __construct()
  {
    $this->add_hooks();
  }


  private function add_hooks()
  {
    add_filter('wpseo_schema_website', [$this, 'filter_wpseo_json_ld'], 10, 2);
  }




  public function filter_wpseo_json_ld($this_data, $context)
  {
    $data = false;

    if (is_front_page()) {
      $data = $this->json_ld_organization();
    }

    if (defined('VSEO_PAGE_ABOUT')) {
      $data = $this->json_ld_about();
    }

    if (defined('VSEO_PAGE_SERVICES')) {
      $data = $this->json_ld_services();
    }

    if (defined('VSEO_SINGLE_SERVICE')) {
      $data = $this->json_ld_single_service();
    }

    return $data ? $data : $this_data;
  }




  private function json_ld_organization()
  {
    $options = get_option('true_options');
    $phone = get_from_array($options, 'tel');
    $email = get_from_array($options, 'email');

    $sign = get_from_array($options, 'signature');
    $address = get_from_array($options, 'adress');

    // pre($options);

    $data = [
      '@context' => 'http://schema.org',
      '@type' => 'Organization',
      'name' => translate_string($sign),
      'url' => get_site_url(),
      'address' => translate_string($address),
      'email' => $email,
      'telephone' => $phone
    ];

    return $data;
  }






  private function json_ld_about()
  {
    global $post;
    $post_id = (int) $post->ID;

    $title = get_the_title();
    $url = $this->get_current_url();
    $desc = get_post_meta($post_id, '_yoast_wpseo_metadesc', true);

    $options = get_option('true_options');
    $address = get_from_array($options, 'adress');

    $phone = get_from_array($options, 'tel');
    $email = get_from_array($options, 'email');
    $city = get_from_array($options, 'city');
    $index = get_from_array($options, 'mail_index');

    $data = [
      '@context' => 'http://www.schema.org',
      '@type' => 'LocalBusiness',
      'name' => $title,
      'url' => $url,
      'logo' => THEME_URI . '/assets/images/ITprofit.svg',
      'image' => THEME_URI . '/assets/images/contact_bg.png',
      'description' => $desc,
      'address' => [
        '@type' => 'PostalAddress',
        'streetAddress' => translate_string($address),
        'addressLocality' => translate_string($city),
        'addressRegion' => 'Минская область',
        'postalCode' => $index
      ],
      'openingHours' => 'Mo, Tu, We, Th, Fr 09:00-18:00',
      'telephone' => $phone,
      'email' => $email
    ];

    return $data;
  }







  private function json_ld_services()
  {
    $options = get_option('true_options');
    $sign = get_from_array($options, 'signature');
    $sign = translate_string($sign);

    $data = [
      '@context' => 'http://schema.org',
      '@type' => 'Service',
      'serviceType' => pll__('Сайты, веб-сервисы, мобильные приложения'),
      'name' => pll__('Сайты, веб-сервисы, мобильные приложения'),
      'url' => $this->get_current_url(),
      'provider' => $sign
    ];

    $data = array_filter($data);

    $list_offers = $this->json_ld_services_list();

    if ($list_offers) {
      $data['hasOfferCatalog'] = [
        '@type' => 'OfferCatalog',
        'name' => pll__('Сайты, веб-сервисы, мобильные приложения'),
        'itemListElement' => $list_offers
      ];
    }

    return $data;
  }






  private function json_ld_services_list()
  {
    $posts = get_posts(['post_type' => 'services', 'numberposts' => -1]);
    if (!$posts) return false;
    $data = [];

    foreach ($posts as &$post) {
      $title = $post->post_title;
      $post_id = (int) $post->ID;
      $content = strip_tags($post->post_content);
      $data[] = [
        '@type' => 'Offer',
        'itemOffered' => [
          '@type' => 'Service',
          'name' => $title,
          'description' => $content,
          'url' => get_permalink($post_id)
        ]
      ];
    }

    return $data;
  }







  private function json_ld_single_service()
  {
    global $post;

    $title = $post->post_title;
    $desc = strip_tags($post->post_content);
    $post_id = (int) $post->ID;
    $img = get_the_post_thumbnail_url($post_id);

    $options = get_option('true_options');
    $sign = get_from_array($options, 'signature');
    $sign = translate_string($sign);

    $data = [
      '@context' => 'http://schema.org',
      '@type' => 'Service',
      'name' => $title,
      'description' => $desc,
      'url' => get_permalink($post_id),
      'provider' => $sign
    ];

    if ($img) {
      $data['image'] = $img;
    }

    return $data;
  }





  private function get_current_url()
  {
    $https = is_ssl();
    $host = get_from_array($_SERVER, 'HTTP_HOST');
    $uri = get_from_array($_SERVER, 'REQUEST_URI');

    $url = $https ? 'https://' : 'http://';
    $url .= $host . $uri;
    return $url;
  }
}
