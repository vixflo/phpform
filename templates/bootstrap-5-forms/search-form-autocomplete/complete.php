<?php
/*=============================================
=         Search autocomplete results         =
=============================================*/

/*

This file is called by autocomplete-example.php (example #3)
it retrieves the $_GET['search'] as search string and $_GET['max_results'] then must echo a JSON array with the matching results.
for instance:
echo '["result 1", "result 2"]';

*/

if (!isset($_GET['search']) || !isset($_GET['max_results']) || !is_numeric($_GET['max_results'])) {
    exit('wrong query');
}

$array = ['Mildred', 'Louise', 'Frances', 'Heather', 'Paula', 'Kathy', 'Donald', 'George', 'Douglas', 'Phyllis', 'Richard', 'Mark', 'Craig', 'Daniel', 'Laura', 'Stephanie', 'Cynthia', 'Mildred', 'Tina', 'Nicole', 'Carl', 'Lori', 'Alice', 'Carolyn', 'Emily', 'Margaret', 'Keith', 'Sarah', 'Teresa', 'Roy', 'Lori', 'Lisa', 'Patrick', 'Cheryl', 'Frances', 'Frances', 'Ronald', 'Paula', 'Jonathan', 'Lisa', 'Roy', 'Janet', 'Barbara', 'Russell', 'James', 'Shirley', 'Beverly', 'Betty', 'Jeremy', 'Billy', 'Eugene', 'Lori', 'Jack', 'Juan', 'Patricia', 'Lois', 'Samuel', 'Theresa', 'Dennis', 'Tina', 'Sean', 'Paul', 'Andrew', 'Janice', 'Lois', 'Edward', 'Diane', 'Anthony', 'Carlos', 'Maria', 'Martha', 'Juan', 'Evelyn', 'Karen', 'Christopher', 'Roger', 'Mary', 'Robin', 'Debra', 'Steve', 'Ryan', 'Ronald', 'Johnny', 'Joseph', 'Theresa', 'Timothy', 'Sharon', 'Joseph', 'Dorothy', 'Philip', 'Edward', 'Andrea', 'James', 'Lori', 'Kathy', 'William', 'Jason', 'Kathy', 'Philip', 'Katherine', 'Ruth', 'Ruth', 'Steven', 'Janet', 'Jose', 'Tammy', 'Carlos', 'Cynthia', 'Stephen', 'Kelly', 'Tammy', 'Paul', 'Michelle', 'Brenda', 'Carlos', 'Steve', 'Teresa', 'Susan', 'Alice', 'Alice', 'Anna', 'Joyce', 'Rachel', 'Sharon', 'Sharon', 'Terry', 'Robin', 'Margaret', 'Irene', 'Larry', 'Robin', 'Stephen', 'Ryan', 'Juan', 'Paul', 'Johnny', 'Jeremy', 'Virginia', 'Shawn', 'Joe', 'Bonnie', 'Timothy', 'Edward', 'Daniel', 'Louis', 'Christopher', 'Joshua', 'Daniel', 'Raymond', 'Sean', 'Peter', 'Jeffrey', 'Rebecca', 'Maria', 'Beverly', 'George', 'Lori', 'Eugene', 'Donna', 'Shirley', 'Richard', 'Nancy', 'Larry', 'Rebecca', 'Ronald', 'Ronald', 'Jane', 'Jason', 'Judy', 'Beverly', 'Ruth', 'Kathryn', 'Julia', 'Theresa', 'Alan', 'Larry', 'Ruth', 'Gary', 'Walter', 'Carlos', 'Michelle', 'Aaron', 'Jimmy', 'Arthur', 'Christina', 'Kimberly', 'Rebecca', 'Johnny', 'Brian', 'Roy', 'Jane', 'Clarence', 'Harold', 'Kimberly', 'Dennis', 'Joe', 'Charles', 'Marie', 'Lois', 'Louis', 'Christopher', 'Cheryl', 'Dorothy', 'Norma', 'Joan', 'Douglas', 'Debra', 'Ruth', 'Steven', 'Jerry', 'Beverly', 'Julia', 'Frances', 'Donald', 'Diane', 'Diane', 'Shawn', 'Irene', 'Jesse', 'Kathy', 'Phillip', 'Jane', 'Nicole', 'Steven', 'Shirley', 'Emily', 'Jeremy', 'Randy', 'Kathryn', 'Ralph', 'Bonnie', 'Brenda', 'Janice', 'Judith', 'Benjamin', 'Jimmy', 'Mary', 'Betty', 'Todd', 'Andrew', 'Christopher', 'Laura', 'Alice', 'Charles', 'Henry', 'Keith', 'Frank', 'Melissa', 'Linda', 'Annie', 'Patricia', 'Gregory', 'Cheryl', 'Peter', 'Henry', 'Sean', 'Anna', 'Adam', 'Kathy', 'Mary', 'Joan', 'Melissa', 'Ryan', 'Susan', 'Samuel', 'Jesse', 'Cynthia', 'Mildred', 'Ernest', 'Kenneth', 'Rose', 'John', 'Walter', 'Justin', 'Lillian', 'Gregory', 'Lillian', 'Eric', 'Ronald', 'Nicole', 'Terry', 'Doris', 'Paula', 'Theresa', 'Russell', 'Lori', 'Carlos', 'Steven', 'Denise', 'Billy', 'Ashley', 'Gloria', 'Carlos', 'Wanda', 'Beverly', 'Robert', 'Sara', 'Robin', 'Jack', 'Brenda', 'Jose', 'Matthew', 'Lori', 'Ryan', 'Joe', 'Lori', 'Roy', 'Julie', 'Gregory', 'Diana', 'Brandon', 'Clarence', 'Cheryl', 'Kathleen', 'Heather', 'Shawn', 'Jimmy', 'Kenneth', 'Kathleen', 'Sharon', 'Louis', 'Carolyn', 'Justin', 'Gerald', 'Jesse', 'Matthew', 'Jesse', 'Paula', 'Juan', 'Roger', 'Debra', 'Earl', 'Linda', 'Juan', 'Mildred', 'Catherine', 'Janice', 'Mark', 'Joe', 'Antonio', 'Adam', 'Susan', 'Eric', 'Douglas', 'Jessica', 'Katherine', 'Martin', 'Anna', 'Richard', 'Rose', 'Shirley', 'Judith', 'Michael', 'Kimberly', 'Gregory', 'Steve', 'Kathy', 'Louis', 'Marilyn', 'Willie', 'Ronald', 'Amanda', 'Adam', 'Denise', 'Jesse', 'Marilyn', 'Christopher', 'Maria', 'Evelyn', 'Jose', 'Gary', 'Laura', 'Lori', 'Sandra', 'Larry', 'Randy', 'Katherine', 'Jeremy', 'Terry', 'Jeremy', 'Robert', 'Todd', 'Jeremy', 'Janice', 'Judy', 'Nicole', 'Cynthia', 'Samuel', 'Katherine', 'Kelly', 'Willie', 'Joan', 'Michael', 'Antonio', 'Louis', 'Jerry', 'Sharon', 'Bruce', 'Barbara', 'Henry', 'Pamela', 'Patricia', 'Adam', 'Wanda', 'Todd', 'Andrea', 'Charles', 'Aaron', 'Sean', 'Howard', 'Martha', 'Nancy', 'Katherine', 'Keith', 'Louise', 'Jose', 'Randy', 'Ann', 'Ryan', 'Debra', 'Helen', 'Joshua', 'Carolyn', 'Aaron', 'Jack', 'Andrew', 'Patrick', 'Roger', 'Nicholas', 'Terry', 'James', 'Donna', 'Julia', 'Benjamin', 'Denise', 'Jeremy', 'Juan', 'Rebecca', 'Paul', 'Mark', 'Helen', 'James', 'Kathleen', 'Eric', 'Denise', 'Robert', 'Stephanie', 'Martin', 'Robert', 'Jason', 'Martin', 'William', 'Ashley', 'Joshua', 'Benjamin', 'Susan', 'Frances', 'Todd', 'Billy', 'Martha', 'Albert', 'Alice', 'Charles', 'Dorothy', 'Bobby', 'David', 'Joseph', 'Earl', 'Wanda', 'Larry', 'David', 'Eric', 'Julia', 'Kathryn', 'Bruce', 'Helen', 'Virginia', 'Wayne', 'Joseph', 'Robin', 'Dorothy', 'Alan', 'Edward', 'Juan', 'Walter', 'Jesse', 'Walter', 'Raymond', 'Melissa', 'Joyce', 'Dorothy', 'Terry', 'Donald', 'Sandra', 'Sharon', 'Michelle', 'Donald', 'Amanda', 'Gerald', 'Andrea', 'Carl', 'Kelly', 'Linda', 'Jonathan', 'Amanda', 'Alan', 'Gerald', 'Doris', 'Martha', 'Rachel', 'Benjamin', 'Craig', 'Stephen', 'Pamela', 'Philip', 'Barbara', 'Keith', 'Diane', 'Joshua', 'Heather', 'Marie', 'Ralph', 'Jerry', 'Barbara', 'Billy', 'Mark', 'Melissa', 'Joseph', 'Deborah', 'Sara', 'William', 'Jennifer', 'Katherine', 'George', 'Alice', 'Earl', 'Willie', 'Terry', 'Anna', 'Harry', 'Daniel', 'Albert', 'Frank', 'Todd', 'Lillian', 'Russell', 'William', 'Antonio', 'Marie', 'Phillip', 'Michelle', 'Sara', 'Paula', 'Gerald', 'Debra', 'Juan', 'Stephen', 'Phillip', 'Howard', 'Adam', 'Brandon', 'Patrick', 'Carol', 'Robin', 'Paula', 'Norma', 'Craig', 'Martha', 'Brenda', 'Terry', 'Helen', 'Russell', 'Maria', 'Robin', 'Gregory', 'Ruby', 'Clarence', 'Doris', 'Louis', 'Andrea', 'Carolyn', 'Diana', 'Norma', 'Anthony', 'Michelle', 'Johnny', 'Catherine', 'Elizabeth', 'Gregory', 'Roger', 'Ernest', 'Julia', 'John', 'Ernest', 'Alan', 'Dorothy', 'Sharon', 'Norma', 'Christopher', 'Lori', 'Lisa', 'Philip', 'Carol', 'Diana', 'Nancy', 'Margaret', 'Russell', 'Edward', 'William', 'Albert', 'Gloria', 'Rebecca', 'Lawrence', 'Donald', 'Patricia', 'Maria', 'Roy', 'Anthony', 'Maria', 'Steven', 'Robert', 'Stephen', 'Jane', 'Eugene', 'Irene', 'Philip', 'Sarah', 'Thomas', 'Mark', 'Gloria', 'Tina', 'Christopher', 'Janice', 'Bonnie', 'Fred', 'Melissa', 'Amanda', 'Beverly', 'Amy', 'Roy', 'Betty', 'Louis', 'Stephen', 'Kathryn', 'Helen', 'Marilyn', 'Tammy', 'Gary', 'Teresa', 'Brandon', 'Antonio', 'Sara', 'Pamela', 'Donald', 'Michael', 'Anne', 'Annie', 'Elizabeth', 'Lori', 'Lois', 'Sarah', 'Michelle', 'Lori', 'Michelle', 'Dennis', 'Brandon', 'Gregory', 'Christopher', 'Walter', 'Gary', 'Richard', 'Sarah', 'Robert', 'Jessica', 'Randy', 'Amy', 'Howard', 'Michelle', 'Emily', 'Diane', 'Helen', 'Joan', 'Earl', 'Ernest', 'Thomas', 'Maria', 'Rose', 'Frank', 'Nancy', 'Larry', 'Philip', 'Michael', 'Susan', 'Ann', 'Karen', 'Judy', 'Tammy', 'Jerry', 'Christina', 'Jason', 'Mary', 'Tina', 'David', 'Janet', 'Henry', 'Robin', 'Charles', 'Jane', 'Alan', 'Rebecca', 'Susan', 'Kevin', 'Christina', 'Benjamin', 'Beverly', 'Donald', 'Dorothy', 'Jane', 'Kimberly', 'Lillian', 'Paul', 'Brian', 'Kathryn', 'Anthony', 'Michael', 'Dorothy', 'Ralph', 'Charles', 'Victor', 'Phillip', 'Catherine', 'Norma', 'Janice', 'Patricia', 'Teresa', 'Gerald', 'Kenneth', 'Carl', 'Louise', 'Nicholas', 'Harry', 'Edward', 'Mary', 'Gary', 'Michelle', 'Ruby', 'David', 'Carolyn', 'Eugene', 'Helen', 'Benjamin', 'Jean', 'Mildred', 'Philip', 'Albert', 'Randy', 'Chris', 'Barbara', 'Scott', 'Jonathan', 'Katherine', 'Randy', 'Lois', 'Laura', 'Annie', 'Wanda', 'Charles', 'Amy', 'Billy', 'Kathleen', 'Michelle', 'Bonnie', 'Lori', 'Elizabeth', 'Theresa', 'Thomas', 'Antonio', 'Irene', 'Sandra', 'Diana', 'Louise', 'Debra', 'Jeffrey', 'Frank', 'Paula', 'Ronald', 'Gloria', 'Martha', 'Sandra', 'Victor', 'Ralph', 'Brian', 'Judith', 'Ruth', 'Kimberly', 'Amanda', 'Diane', 'Mildred', 'Anna', 'Kimberly', 'Christine', 'Rose', 'Angela', 'Steven', 'Matthew', 'Justin', 'Raymond', 'Ryan', 'Willie', 'Joan', 'Jonathan', 'Joshua', 'Beverly', 'Gary', 'Maria', 'Terry', 'Ronald', 'Jeffrey', 'Debra', 'Robin', 'Clarence', 'Roger', 'Mary', 'Donna', 'Susan', 'Paul', 'Jose', 'Rachel', 'Wanda', 'Todd', 'Rebecca', 'Jerry', 'Dennis', 'Theresa', 'Nicholas', 'Jerry', 'Frances', 'Henry', 'Heather', 'Adam', 'Adam', 'Shawn', 'Nancy', 'Heather', 'Rose', 'Raymond', 'Martha', 'Carolyn', 'Virginia', 'Teresa', 'Annie', 'Ann', 'Sean', 'Albert', 'Virginia', 'Kimberly', 'Stephen', 'Catherine', 'Debra', 'Joshua', 'Arthur', 'Jacqueline', 'Ruby', 'Bruce', 'Linda', 'Emily', 'Philip', 'Gloria', 'Lillian', 'Steven', 'Dennis', 'Kathy', 'Timothy', 'Carolyn', 'Sandra', 'Alice', 'Christopher', 'Philip', 'Nancy', 'Kelly', 'Aaron', 'Martha', 'Elizabeth', 'Carl', 'Antonio', 'Andrea', 'Jean', 'Terry', 'Jonathan', 'Beverly', 'Douglas', 'Mary', 'Mary', 'Gary', 'Gary', 'Phillip', 'Craig', 'Russell', 'Ashley', 'Jonathan', 'Michelle', 'Phillip', 'Bobby', 'Shirley', 'Johnny', 'Marie', 'Jonathan', 'Michael', 'Lawrence', 'Judy', 'Stephanie', 'Roy', 'Terry', 'Carol', 'Christina', 'William', 'Charles', 'Christopher', 'Victor', 'Stephen', 'Jose', 'David', 'Jesse', 'Julia', 'Wayne', 'Mark', 'Paula', 'Karen', 'Amanda', 'Raymond', 'Judy', 'John', 'Kenneth', 'Scott', 'Gerald', 'Jack', 'Emily', 'Jeremy', 'Kevin', 'Dennis', 'Cynthia', 'Harold', 'Shirley', 'Carl', 'Andrea', 'Janice', 'Diana', 'Jason', 'Jacqueline', 'Cynthia', 'Jose', 'Anna', 'Patrick', 'Christopher', 'Phyllis', 'Brian', 'Michael', 'Jason', 'Todd', 'Mildred', 'Lillian', 'Kimberly', 'Robin', 'Diana', 'Tina', 'Nicholas', 'Clarence', 'Johnny', 'Scott', 'Paul', 'Douglas', 'Wayne', 'Kevin', 'Christopher', 'Peter', 'Peter', 'George', 'Robin', 'Clarence', 'Ruth', 'Donna', 'Emily', 'Steven', 'Fred', 'Sharon', 'Brian', 'Amy', 'Keith', 'Michael', 'Philip', 'Andrea', 'Ronald', 'Tammy', 'Christopher', 'Henry', 'Jose', 'Albert', 'Henry', 'Dennis', 'Christopher'];

// Search 20 results
$maxResults = $_GET['max_results'];
$found = 0;
$results = [];
for ($i=0; $i < count($array); $i++) {
    if (preg_match('`' . addslashes($_GET['search']) . '`i', $array[$i]) && !in_array($array[$i], $results)) {
        array_push($results, $array[$i]);
        $found += 1;
        if ($found == $maxResults) {
            $i = count($array); // end loop if we reached max_results
        }
    }
}

echo json_encode($results);
