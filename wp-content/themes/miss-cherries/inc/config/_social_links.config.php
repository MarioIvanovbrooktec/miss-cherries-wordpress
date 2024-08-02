<?php

function social_media($wp_customize)
{
    //Setting
    $wp_customize->add_setting('instagram', array( 'default' => '' ));
    $wp_customize->add_setting('twitter', array( 'default' => '' ));
    $wp_customize->add_setting('facebook', array( 'default' => '' ));
    $wp_customize->add_setting('youtube', array( 'default' => '' ));
    $wp_customize->add_setting('pinterest', array( 'default' => '' ));

    //Section
    $wp_customize->add_section(
        'social-media',
        array(
            'title' => __('Social Media', '_s'),
            'priority' => 30,
            'description' => __(
                'Enter the URL to your accounts for each social media for the icon to appear in the footer.',
                '_s'
            )
        )
    );

    //Control
    //Twitter
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'twitter',
                array(
                    'label' => __('Twitter', '_s'),
                    'section' => 'social-media',
                    'setting' => 'twitter'
                )
            )
        );
    //Instagram
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'instagram',
            array(
                'label' => __('Instagram', '_s'),
                'section' => 'social-media',
                'setting' => 'instagram'
            )
        )
    );
    //Facebook
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'facebook',
            array(
                'label' => __('Facebook', '_s'),
                'section' => 'social-media',
                'setting' => 'facebook'
            )
        )
    );
    //Pinterest
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'pinterest',
                array(
                    'label' => __('Pinterest', '_s'),
                    'section' => 'social-media',
                    'setting' => 'pinterest'
                )
            )
        );
    //Youtube
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'youtube',
            array(
                'label' => __('YouTube', '_s'),
                'section' => 'social-media',
                'setting' => 'youtube'
            )
        )
    );
}

add_action('customize_register', 'social_media');
