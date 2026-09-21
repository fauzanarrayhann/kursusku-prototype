<?php
$start = new DateTimeImmutable('2026-09-15');
echo $start->format('Y-m-d') . '<br>';
echo $start->format('d-m-Y') . '<br>';
echo $start->format('d/m/Y');
