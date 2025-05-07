<?php

class VoteManager {
    private $poll;

    public function __construct(Poll $poll) {
        $this->poll = $poll;
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function hasVoted(): bool {
        $key = $this->getVoteKey();
        return isset($_SESSION[$key]);
    }

    public function recordVote(int $optionIndex): bool {
        if ($this->hasVoted()) return false;
        if ($this->poll->vote($optionIndex)) {
            $_SESSION[$this->getVoteKey()] = true;
            return true;
        }
        return false;
    }

    private function getVoteKey(): string {
        return "voted_" . $this->poll->getId();
    }
}
