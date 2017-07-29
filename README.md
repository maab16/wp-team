# wp-team

[![Build Status](https://travis-ci.org/maab16/wp-team.svg?branch=master)](https://travis-ci.org/maab16/wp-team)
[![license](https://img.shields.io/github/license/mashape/apistatus.svg)]()
[![Packagist Pre Release](https://img.shields.io/packagist/vpre/symfony/symfony.svg)]()

![Alt text](http://i.imgur.com/eqY7WQ0.png "Optional title")

# Use Shortcode

* Intialize - `[wp-team]`
* Title - `[wp-team title="Your Title"]`
* Dots Navigation - `[wp-team dots="true"]`
* autoplay - `[wp-team autoplay="false"]`
* infinite slides - `[wp-team infinite="true"]`
* Prev Button Class - `[wp-team prev="font_awesome_icon_class_name"]`
* Next Button Class - `[wp-team next="font_awesome_icon_class_name"]`
* How many Slides to show at a time
	* Large device - `[wp-team slides="2"]`
	* Medium device - `[wp-team md_slides="2"]`
	* Small device - `[wp-team sm_slides="2"]`
	* Xtra-Small device - `[wp-team xs_slides="1"]`
* How many Slides to Move at a time when autoplay or grabbing
	* Large device - `[wp-team scroll="2"]`
	* Medium device - `[wp-team md_scroll="2"]`
	* Small device - `[wp-team sm_scroll="2"]`
	* Xtra-Small device - `[wp-team xs_scroll="1"]`


## Use multiple attributes

```
[wp-team title="Your title" autoplay="true" dots="false"]
```