# Simple Poll & Voting System (PHP OOP)

A simple yet powerful voting system built with pure PHP (OOP). It allows you to create polls with multiple options, accept user votes, and display real-time results. Perfect for websites, feedback forms, or interactive surveys.

## Features

- Object-Oriented PHP
- Create polls with any number of options
- Record user votes (IP-based or session-based)
- Prevent multiple votes from the same user
- Display total votes and percentage per option
- JSON-based data storage (no database required)
- Easy to customize and extend
- Simple frontend included

## How It Works

1. Define a poll (question and options).
2. Show poll to user with voting form.
3. Store votes in a JSON file.
4. Track IP addresses or session IDs to block repeated votes.
5. Display results with vote count and percentage.

## Example

**Poll:**

What is your favorite programming language?

1 - PHP
2 - JavaScript
3 - Python
4 - Java


**User Vote:**  
The user selects "PHP" and submits.

**Result Output:**

1 - PHP - 12 votes (40%)
2 - JavaScript - 9 votes (30%)
3 - Python - 6 votes (20%)
4 - Java - 3 votes (10%)



## Requirements

- PHP 7.0+
- No external dependencies
- Works in any shared hosting or localhost

## File Structure (optional)

- `polls/` — JSON files storing poll data
- `classes/` — Core PHP classes (Poll.php, VoteManager.php, etc.)
- `index.php` — Main page (poll display + voting)
- `results.php` — View poll results

## Usage

1. Clone the repository:

```bash
git clone https://github.com/zangane/Simple-Poll-Voting-System.git
```

2. Open `index.php` in browser to see and vote.

3. To create new polls, edit or add JSON files in the `polls/` folder.

## License

MIT License. See `LICENSE` file for more information.


