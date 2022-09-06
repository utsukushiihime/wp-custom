<?php

/**
 * @package Holmes
 * @version 1.0.0
 */
/*
Plugin Name: Holmes
Plugin URI: http://wordpress.org/plugins/hello-holmes/
Description: When activated you will randomly see a lyric from <cite>Sherlock Holmes</cite> in the upper right of your admin screen on every page.
Author: Crystal McNeil
Version: 1.0.0
Author URI: https://crystalmcneil.tech
*/

function holmes_get_lyric()
{
	/** These are the lyrics to Hello Dolly */
	$lyrics = "
	One night—it was in June, ’89—there came a ring to my bell, about the hour when a man gives his first yawn and glances at the clock., 
I sat up in my chair, and my wife laid her needle-work down in her lap and made a little face of disappointment.,
“A patient!” said she. “You’ll have to go out.”,
I groaned, for I was newly come back from a weary day.,
We heard the door open, a few hurried words, and then quick steps upon the linoleum.,
Our own door flew open, and a lady, clad in some dark-coloured stuff, with a black veil, entered the room.,
“You will excuse my calling so late,” she began, and then, suddenly losing her self-control, she ran forward, threw her arms about my wife’s neck, and sobbed upon her shoulder.,
“Oh, I’m in such trouble!” she cried; “I do so want a little help.”,
“Why,” said my wife, pulling up her veil, “it is Kate Whitney.,
 How you startled me, Kate! I had not an idea who you were when you came in.”,
“I didn’t know what to do, so I came straight to you.” That was always the way.,
Folk who were in grief came to my wife like birds to a lighthouse.,
“It was very sweet of you to come. Now, you must have some wine and water, and sit here comfortably and tell us all about it.,
 Or should you rather that I sent James off to bed?”,
“Oh, no, no! I want the doctor’s advice and help, too.,
It’s about Isa. He has not been home for two days. I am so frightened about him!”,
It was not the first time that she had spoken to us of her husband’s trouble, to me as a doctor, to my wife as an old friend and school companion.,
We soothed and comforted her by such words as we could find. Did she know where her husband was?,
Was it possible that we could bring him back to her?,
	
	";

	// Here we split it into lines.
	$lyrics = explode("\n", $lyrics);

	// And then randomly choose a line.
	return wptexturize($lyrics[mt_rand(0, count($lyrics) - 1)]);
}

// This just echoes the chosen line, we'll position it later.
function holmes()
{
	$chosen = holmes_get_lyric();
	$lang   = '';
	if ('en_' !== substr(get_user_locale(), 0, 3)) {
		$lang = ' lang="en"';
	}

	printf(
		'<p id="holmes"><span class="screen-reader-text">%s </span><span dir="ltr"%s>%s</span></p>',
		__('Quote from Sherlock Holmes, by Sir Arthur Conan Doyle', 'holmes'),
		$lang,
		$chosen
	);
}

// Now we set that function up to execute when the admin_notices action is called.
add_action('admin_notices', 'holmes');

// We need some CSS to position the paragraph.
function holmes_css()
{
	echo "
	<style type='text/css'>
	#holmes {
		float: right;
		padding: 5px 10px;
		margin: 0;
		font-size: 12px;
		line-height: 1.6666;
	}
	.rtl #holmes {
		float: left;
	}
	.block-editor-page #holmes {
		display: none;
	}
	@media screen and (max-width: 782px) {
		#holmes,
		.rtl #holmes {
			float: none;
			padding-left: 0;
			padding-right: 0;
		}
	}
	</style>
	";
}

add_action('admin_head', 'holmes_css');
