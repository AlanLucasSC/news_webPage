<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GrahamCampbell\Markdown\Facades\Markdown;

class MarkdownController extends Controller
{
    public function markdownToHtml(Request $request){
        $markdown = str_replace('\`', '`', $request->markdown);
        $markdown = str_replace('\'', `'`, $request->markdown);
        $markdown = str_replace('\"', '"', $request->markdown);
        $markdown = Markdown::convertToHtml($markdown);
        //$markdown = str_replace('', ' ', $request->markdown);
        $markdown = $this->tagVideo($markdown);
        return $markdown;
    }

    public function tagVideo($markdown){
        $newMarkdown = $markdown;
        $initialPositionOfShortcutVideo = strrpos($newMarkdown, "?[");
        $finalPositionOfShortcutVideo = strrpos($newMarkdown, "]?");
        while ($initialPositionOfShortcutVideo !== false && $finalPositionOfShortcutVideo !== false && $newMarkdown[$initialPositionOfShortcutVideo+2] != ']') { // note: três sinais iguais
            $urlLength = $finalPositionOfShortcutVideo - ($initialPositionOfShortcutVideo + 2);
            $url = substr($newMarkdown, $initialPositionOfShortcutVideo + 2, $urlLength);
            $videoTag = '<video width="100%" height="100%" controls="">
                            <source src="'. $url .'" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>';
            $shortcutVideo = '?['. $url .']?';
            $newMarkdown = str_replace($shortcutVideo, $videoTag, $newMarkdown);
            //return $newMarkdown[$initialPositionOfShortcutVideo+2];
            
            $initialPositionOfShortcutVideo = strrpos($newMarkdown, "?[");
            $finalPositionOfShortcutVideo = strrpos($newMarkdown, "]?");
        }
        return $newMarkdown;
    }
}
