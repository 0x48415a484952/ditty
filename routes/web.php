<?php

Route::view('/{parameters?}', 'main')->where('parameters', '.*');
