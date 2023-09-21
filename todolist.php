<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<body ng-app="myApp" ng-controller="todoCtrl">

<h2>My Todo List</h2>

<form ng-submit="todoAdd()" ng-hide="myVar">
    <input type="text" ng-model="todoInput" size="50" placeholder="Add New">
    <input type="submit" value="Add New">
</form>

<br>

<div ng-repeat="x in todoList">
    <input type="checkbox" ng-model="x.done"> <span ng-bind="x.todoText"></span>
</div>

<p><button ng-click="remove()">Remove marked</button>
    <button ng-click="toggle()">Toggle Form</button>
</p>

<script>
var app = angular.module('myApp', []); 
app.controller('todoCtrl', function($scope) {
    $scope.todoList = [{todoText:'Clean House', done:false}];

    $scope.todoAdd = function() {
        $scope.todoList.push({todoText:$scope.todoInput, done:false});
        $scope.todoInput = "";
    };

    $scope.remove = function() {
        var oldList = $scope.todoList;
        $scope.todoList = [];
        angular.forEach(oldList, function(x) {
            if (!x.done) $scope.todoList.push(x);
        });
    };

    $scope.myVar = false;
    $scope.toggle = function() {
        $scope.myVar = !$scope.myVar;
    };
});
</script>

</body>
</html>
