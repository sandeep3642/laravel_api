<?php

# CodeToad
# Richie McMullen
# 2019

return [

    'client_id' => env('CT_STRAVA_CLIENT_ID', '30986'),
    'client_secret' => env('CT_STRAVA_SECRET_ID', '48ec21fff3078adba68d5c6174c2422f0693574d'),
    'redirect_uri' => env('CT_STRAVA_REDIRECT_URI', 'http://127.0.0.1:8000/stravaToken'),

];
