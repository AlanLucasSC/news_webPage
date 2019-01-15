@showNews([
    'title' => $news->title,
    'subtitle' => $news->subtitle,
    'date' => $news->date,
    'time' => $news->time,
    'lastUpdated' => $news->updated_at,
    'urlPhoto' => URL::to('/') . '/files/' . $image->name,
    'source' => 'autor',
    'text' => $news->text,
    'urlAuthor' => '#',
    'author' => $user->name,
    'authorDescription' => 'Teste'
])
@endshowNews