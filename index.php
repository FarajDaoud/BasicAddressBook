<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Address Book</title>
    <meta name="description" content="Example address book">
    <meta name="author" content="Faraj Daoud">
    <meta name="keywords" content="address, book, portfolio">
    <meta name="robots" content="index, follow">
    <link rel="shortcut icon" href="favicon.ico?v=1.1" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link href="css/main.css?v=1.1" rel='stylesheet'>
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
    
    <?php 
       require_once("../../html/header.html");
    ?>   
    
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Address Book Challenge</h2>
                <p>Develop a Angular 1.x based basic address book application in under (3-5) hours.</p>
                <p>The data source is supplied in an XML file: <a href="/subsite/addressBook/resources/ab.xml" alt="Address Book XML File" target="_blank">address book data</a></p>
                <p>Application specification is not provided. You decide on the functionality and features that you can deliver within the time limit.
                    The application should present the available contacts in two different views (as a minimum):
                </p>
                <ol>
                    <li>Table view</li>
                    <li>Business card view, that presents several business cards on screen</li>
                </ol>
            </div>
            <div class="col-12">
                <h2>Proposed Execution Plan</h2>
                <ol>
                    <li>Determine what the minimum viable product should be.</li>
                    <li>Re-teach myself Angular JS because.... reasons....</li>
                    <li>Create HTML boilerplate.</li>
                    <li>Link to bootstrap and Angular JS</li>
                    <li>Figure out how to extract the data from the supplied XML file. Maybe convert it to JSON later.</li>
                    <li>Create a table and generate table rows from the extracted data.</li>
                    <li>Create a card template and generate cards from the extracted data.</li>
                    <li>Figure out a way to allow the user to switch between views.</li>
                    <li>If time permits add additional functionality:
                        <ul>
                            <li>Maybe add the DataTable library.</li>
                            <li>Allow users to filter or search table data and cards.</li>
                            <li>Add a modal popup from table view that presents address data in a card view.</li>
                        </ul>
                    </li>
                </ol>
            </div>
        </div>
    </div>
    
    <div ng-app="myApp" ng-controller="appCtrl">
        <div class="container">
            <ul class="nav nav-pills nav-fill">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="pill" href="#buisnessCardView">Business Card View</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#tableView">Table View</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane container active" id="buisnessCardView">
                    <h2>Business Card View</h2>
                    <div class="row" id="cardsView">
                        <div class="justify-content-md-center col-12 col-lg-6" ng-repeat="x in contacts">
                            <div class="card col-12">
                                <div class="card-body">
                                    <h5 class="card-title">{{ x.CompanyName }}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{ x.ContactName }} - {{ x.ContactTitle }}</h6>
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <span>Email: {{ x.Email }}</span><br>
                                            <span>Phone: {{ x.Phone }}</span><br>
                                            <span class="faxSpan">{{ x.Fax ? 'Fax: ' + x.Fax : ''}}</span>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <span>{{ x.Address }}</span><br>
                                            <span>{{ x.City }}, {{ x.Country }}</span><br>
                                            <span>{{ x.PostalCode }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane container-fluid fade" id="tableView">
                    <div class="row">
                        <h2>Table View</h2>
                        <div class="col-12" id="tableView">
                            <table class="table-sm table-responsive table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Customer ID</th>
                                        <th>Company Name</th>
                                        <th>Contact Name</th>
                                        <th>Contact Title</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>Email</th>
                                        <th>Postal Code</th>
                                        <th>Country</th>
                                        <th>Phone</th>
                                        <th>Fax</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="x in contacts">
                                        <td>{{ x.CustomerID }}</td>
                                        <td>{{ x.CompanyName }}</td>
                                        <td>{{ x.ContactName }}</td>
                                        <td>{{ x.ContactTitle }}</td>
                                        <td>{{ x.Address }}</td>
                                        <td>{{ x.City }}</td>
                                        <td>{{ x.Email }}</td>
                                        <td>{{ x.PostalCode }}</td>
                                        <td>{{ x.Country }}</td>
                                        <td>{{ x.Phone }}</td>
                                        <td>{{ x.Fax }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <!--<script src="js/main.js?v=1.1"></script>-->
    <!--Add xml2json library for xml to json parser-->
    <script type='text/javascript' src="https://cdn.rawgit.com/abdmob/x2js/master/xml2json.js"></script>
    <script>
        var app = angular.module('myApp', []);
        var x2js = new X2JS();
        
        app.controller('appCtrl', function($scope, $http) {
            $scope.contacts = [];
            $http({
                url: "/subsite/addressBook/resources/ab.xml",
                method: "GET",          
                headers: {'Content-Type': 'application/xml','charset' : 'utf-8'}
            }).then(function (response) {
                let jsonResponse = x2js.xml_str2json(response.data);
                $scope.contacts = jsonResponse.AddressBook.Contact;
                //console.log($scope.contacts[0]);
            },function (error){
                console.log('error in retreiving xml file');
            });
        });
    </script>
</body>

</html>