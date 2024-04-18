<?php
function formatCommentTime($time)
{
    $now = now();
    $commentTime = $time->diff($now);

    if ($commentTime->days > 0) {
        if ($commentTime->days == 1) {
            return 'Yesterday';
        } elseif ($commentTime->days > 6) {
            return $time->format('Y-m-d');
        } else {
            return $commentTime->days . ' days ago';
        }
    } elseif ($commentTime->h > 0) {
        return $commentTime->h . ' hours ago';
    } elseif ($commentTime->i > 0) {
        return $commentTime->i . ' minutes ago';
    } else {
        return $commentTime->s . ' seconds ago';
    }
}
?>