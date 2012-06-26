/*
Basic oop in javascript
*/

/*
 * Creates a Person Class
 * 
 */
function Person(fname, lname, gender) {
	this.fname = fname;
	this.lname = lname;
	this.gender = gender;
}

/*
 * To add methods to classes write apend the method name to the class name's prototype property.
 */
Person.prototype.salutations = function() {
	print("Hello "  + this.fname);
}

Person.prototype.gender = function() {
	print("In case you forgot... You are a " + this.gender);
}

/*
 * Creates Child class of student
 */
function Student(grade) {
	//call parent constructor
	Person.call(this);
}

/*
 * Inherit Person
 */
Student.prototype =  new Person;

/*
 * Overwrite Person method salutions
 */
Student.prototype.salutations = function() {
	print("Hello " + this.fname + ". Go to class today!");
}

Student.prototype.goodbye = function() {
	print("Goodbye");
}


//Instantiate new Person object
var person1 = new Student("Chris", "Zietlow", "Male");

person1.salutations();
person1.goodbye();