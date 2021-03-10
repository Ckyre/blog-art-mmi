<?php

function getFormattedDate($date): string
{
    return (new DateTime($date))->format('d/m/Y à H:i');
}

function testNewFunction($date): string
{
	return "ceci est un test avec emacs";
}