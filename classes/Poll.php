<?php

class Poll {
    private $id;
    private $question;
    private $options;
    private $votes;
    private $file;

    public function __construct(string $pollId) {
        $this->id = $pollId;
        $this->file = __DIR__ . "/../polls/{$pollId}.json";
        $this->load();
    }

    private function load() {
        if (!file_exists($this->file)) {
            throw new Exception("Poll not found: {$this->id}");
        }
        $data = json_decode(file_get_contents($this->file), true);
        $this->question = $data["question"] ?? "Untitled Poll";
        $this->options = $data["options"] ?? [];
        $this->votes = $data["votes"] ?? array_fill(0, count($this->options), 0);
    }

    public function getId(): string {
        return $this->id;
    }

    public function getQuestion(): string {
        return $this->question;
    }

    public function getOptions(): array {
        return $this->options;
    }

    public function getVotes(): array {
        return $this->votes;
    }

    public function vote(int $optionIndex): bool {
        if (!isset($this->votes[$optionIndex])) return false;
        $this->votes[$optionIndex]++;
        return $this->save();
    }

    private function save(): bool {
        $data = [
            "question" => $this->question,
            "options" => $this->options,
            "votes" => $this->votes
        ];
        return file_put_contents($this->file, json_encode($data, JSON_PRETTY_PRINT)) !== false;
    }

    public function getResults(): array {
        $total = array_sum($this->votes);
        $results = [];
        foreach ($this->options as $i => $label) {
            $count = $this->votes[$i];
            $percent = $total > 0 ? round(($count / $total) * 100) : 0;
            $results[] = [
                "label" => $label,
                "votes" => $count,
                "percent" => $percent
            ];
        }
        return $results;
    }
}
