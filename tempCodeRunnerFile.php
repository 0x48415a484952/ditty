<?php
$request = new StdClass;
$request->limit = 5;

echo $limit = $request->limit ?? 10;