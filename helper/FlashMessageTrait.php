<?php

namespace Helper;

trait FlashMessageTrait
{
    public function defineMessage(string $type, string $message): void
    {
        $_SESSION['alertClass'] = $type;
        $_SESSION['message'] = $message;
    }
}
