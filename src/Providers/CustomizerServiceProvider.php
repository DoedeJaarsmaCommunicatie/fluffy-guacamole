<?php
namespace App\Providers;

use Kirki;

class CustomizerServiceProvider
{
	
	public $panels = [
		'general'       => [
			'priority'      => 10,
			'title'         => 'Algemene informatie',
			'description'   => 'De algemene informatie voor Thuiszorg Bij U'
		]
	];
	
	public function __construct()
	{
		$this->initKirki();
		$this->addPanels();
		$this->addSections();
		$this->boot();
	}
	
	public function boot(): void
	{
		$this->addPhoneControls();
		$this->addEmailControls();
		$this->addCompanyControls();
		$this->addRequestFormControls();
	}
	
	protected function addPhoneControls(): void
	{
		Kirki::add_field( 'biju', [
			'type'     => 'text',
			'settings' => 'phonenumber',
			'label'    => esc_html__( 'Het algemene telefoonnummer', 'biju' ),
			'section'  => 'phone',
			'default'  => esc_html__( '035-631 70 80', 'biju' ),
			'priority' => 10,
		]);
		
		Kirki::add_field( 'biju', [
			'type'     => 'text',
			'settings' => 'mobilenumber',
			'label'    => esc_html__( 'Een extra telefoonnummer', 'biju' ),
			'section'  => 'phone',
			'default'  => esc_html__( '06-284 00 504', 'biju' ),
			'priority' => 20,
		]);
	}
	
	protected function addEmailControls(): void
	{
		Kirki::add_field('biju', [
			'type'      => 'text',
			'settings'  => 'emailaddress',
			'label'     => esc_html__('Het algemene email adres', 'biju'),
			'section'   => 'email',
			'default'   => esc_html__('info@thuiszorgdotte.nl', 'biju'),
			'priority'  => 10,
		]);
	}
	
	protected function addCompanyControls(): void
	{
		Kirki::add_field('biju', [
			'type'     => 'text',
			'settings' => 'address',
			'label'    => esc_html__( 'Het adres', 'kirki' ),
			'section'  => 'company',
			'default'  => esc_html__( 'Huizermaatweg 600', 'kirki' ),
			'priority' => 10,
		]);
		
		Kirki::add_field('biju', [
			'type'     => 'text',
			'settings' => 'postalcode',
			'label'    => esc_html__( 'De postcode', 'biju' ),
			'section'  => 'company',
			'default'  => esc_html__( '1276 LN', 'biju' ),
			'priority' => 10,
		]);
		
		Kirki::add_field('biju', [
			'type'     => 'text',
			'settings' => 'city',
			'label'    => esc_html__( 'De plaats', 'biju' ),
			'section'  => 'company',
			'default'  => esc_html__( 'Huizen', 'biju' ),
			'priority' => 10,
		]);
		
		Kirki::add_field('biju', [
			'type'     => 'text',
			'settings' => 'kvk',
			'label'    => esc_html__( 'KvK nummer', 'biju' ),
			'section'  => 'company',
			'default'  => esc_html__( '6790306', 'biju' ),
			'priority' => 10,
		]);
		
		Kirki::add_field('biju', [
			'type'     => 'text',
			'settings' => 'agb',
			'label'    => esc_html__( 'AGB nummer', 'biju' ),
			'section'  => 'company',
			'default'  => esc_html__( '73736684', 'biju' ),
			'priority' => 10,
		]);
		
		Kirki::add_field('biju', [
			'type'        => 'image',
			'settings'    => 'about_image',
			'label'       => esc_html__('Afbeelding kaart', 'biju'),
			'description' => esc_html__('Deze afbeelding laat zien waar het werkgebied is', 'biju'),
			'section'     => 'company',
			'default'     => '',
			'choices'     => [
				'save_as' => 'id',
			]
		]);
	}
	
	protected function addRequestFormControls(): void
	{
		Kirki::add_field('biju', [
			'type'          => 'text',
			'settings'      => 'care_title',
			'label'         => esc_html__('Titel voor zorg aanvragen', 'biju'),
			'description'   => esc_html__('Deze tekst verschijnt als een titel op de site', 'biju'),
			'section'       => 'request_form',
			'default'       => 'Zorg aanvragen'
		]);
		
		Kirki::add_field('biju', [
			'type'          => 'editor',
			'settings'      => 'care_content',
			'label'         => esc_html__('Tekst voor op algemeen blok voor zorgaanvraag', 'biju'),
			'description'   => esc_html__('Deze tekst verschijnt op de site.', 'biju'),
			'section'       => 'request_form',
			'default'       => ''
		]);
		
		Kirki::add_field('theme_config_id', [
			'type'        => 'dropdown-pages',
			'settings'    => 'care_page',
			'label'       => esc_html__( 'De pagina met het formulier', 'biju' ),
			'section'     => 'request_form',
			'priority'    => 10,
		]);
		
		Kirki::add_field('biju', [
			'type'        => 'image',
			'settings'    => 'care_image',
			'label'       => esc_html__('Afbeeling zorg aanvragen', 'biju'),
			'description' => esc_html__('Een mooie sfeerfoto die goed laat zien wat het doel is van de site.', 'biju'),
			'section'     => 'request_form',
			'default'     => '',
			'choices'     => [
				'save_as' => 'id',
			]
		]);
	}
	
	protected function addSections(): void
	{
		Kirki::add_section( 'phone', [
			'title'          => esc_html__( 'Telefoonnummer', 'biju' ),
			'description'    => esc_html__( 'Het telefoonnummer', 'biju' ),
			'panel'          => 'general',
			'priority'       => 160,
		]);
		
		Kirki::add_section('email', [
			'title'         => esc_html__('Emailadres', 'biju'),
			'description'   => esc_html__('Het emailadres', 'biju'),
			'panel'         => 'general',
			'priority'      => 80
		]);
		
		Kirki::add_section( 'company', [
			'title'         => esc_html__('Algemene bedrijfsinformatie', 'biju'),
			'description'   => esc_html__('Algemene bedrijfsinformatie', 'biju'),
			'panel'         => 'general',
			'priority'      => 20
		]);
		
		Kirki::add_section( 'request_form', [
			'title'         => esc_html__('Gegevens aanvragen zorg', 'biju'),
			'description'   => esc_html__('Deze informatie gebruiken wij voor het stuk met zorg aanvragen', 'biju'),
			'panel'         => 'general',
			'priority'      => 20
		]);
	}
	
	private function initKirki(): void
	{
		Kirki::add_config( 'biju', [
			'capability'    => 'edit_theme_options',
			'option_type'   => 'theme_mod',
		] );
	}
	
	private function addPanels(): void
	{
		foreach( $this->panels as $id => $panel) {
			Kirki::add_panel( $id, array(
				'priority'    => $panel['priority']?? 10,
				'title'       => esc_html__( $panel['title'], 'biju' ),
				'description' => esc_html__( $panel['description'], 'biju' ),
			) );
		}
		
	}
}
