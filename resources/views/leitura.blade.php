@showNews([
    'title' => $news->title,
    'subtitle' => $news->subtitle,
    'date' => $news->date,
    'time' => $news->time,
    'lastUpdated' => $news->updated_at,
    'urlPhoto' => $image ? URL::to('/') . '/files/' . $image->name : '',
    'source' => '',
    'text' => $news->text,
    'urlAuthor' => '#',
    'author' => $user->name,
    'authorDescription' => 'Teste',
    'id' => $news->id
])
@endshowNews