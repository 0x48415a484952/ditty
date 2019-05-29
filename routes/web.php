<?php

Route::view('/{parameters?}', 'front.main')->where('parameters', '.*');
