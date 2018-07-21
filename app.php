<?php
	(@include_once("app.inc")) OR die("Please copy app.inc.default to app.inc and configure your API keys\n");
	require_once("movieapi.php");
	require_once("IMDBapi.php");
	require_once("omdbapi.php");
	require_once("tmdbapi.php");
