NiniDB
======

A (sub)wrapper of the excellent [PDOWrapper Lib](https://github.com/mikehenrty/thin-pdo-wrapper/ "PDOWrapper lib") 

Thin PDOWrapper is a

> A simple database client utilizing PHP PDO.

> Advantages:
>
> Maintains at most one connection to slave DB and one to master DB per request.
> Automatically uses slave connection for data retrieval, master for writes.
> Randomized slave connection, with automatic fallback to master if no slaves exist.
> Enforces data sanitization (using PDO prepared statements and bind parameters).
> Catches all errors, and writes them to error log if configured to do so.
> Automatic timestamps for creates and updates
> Handles multiple inserts with a single query.
> Fallback to custom queries if one needs to do a join or second order query.
> Deals exclusively with associative arrays for input/output



FAQ
---

*What did you add?*

- I added functions Update/Delete which calls the parent class update delete functions - kinda useless, I know, but in the future maybe maybe I can  add logging via exception handling functionality.

- As I took inspiration from Codeignite - I added the get_where function as well.

- I also added custom query functions (execq,simpleSelect) which call functions already built into [thin pdo wrapper](https://github.com/mikehenrty/thin-pdo-wrapper "Thin PDO Wrapper github").

*License?*

- It's free for you to use. It would be nice if you could contribute.. :) 

- I plan to add more features based off codeignite functions.
