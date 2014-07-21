<?php

//faz logout no sistema
unset($_SESSION);
session_destroy();
header("Location: /home");
die();
