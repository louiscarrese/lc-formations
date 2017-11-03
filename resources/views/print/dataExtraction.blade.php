<?php
//    $min_date = Carbon\Carbon::now()->subYear()->startOfYear();
//    $max_date = Carbon\Carbon::now()->subYear()->endOfYear();
?>


<h2>Extractions pour la période du {{$min_date->format('d/m/Y')}} - {{$max_date->format('d/m/Y')}}</h2>
<pre>
<?php
print_r($byModule);
print_r($byDomaine);
?>

</pre>
