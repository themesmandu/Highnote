<?php
/**
 * Template part for displaying title Posts page
 *
 * @package Highnote
 */


the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' );
