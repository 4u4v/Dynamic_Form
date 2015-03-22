
/** forms indexes **/
db.getCollection("forms").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** items indexes **/
db.getCollection("items").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** system.users indexes **/
db.getCollection("system.users").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** forms records **/
db.getCollection("forms").insert({
  "_id": ObjectId("54734a25f41c18c414000029"),
  "form_id": NumberInt(1),
  "form_code": "<form class=\"form-horizontal\"> <fieldset> <!-- Form Name --> <legend>Form Name</legend> <!-- Search input--> <div class=\"form-group\"> <label class=\"col-md-4 control-label\" for=\"searchinput\">Search:</label> <div class=\"col-md-4\"> <input id=\"searchinput\" name=\"searchinput\" placeholder=\"请输入关键词\" class=\"form-control input-md\" type=\"search\"> <p class=\"help-block\">KeyWord:</p> </div> </div> <!-- Text input--> <div class=\"form-group\"> <label class=\"col-md-4 control-label\" for=\"textinput\">UserName:</label> <div class=\"col-md-4\"> <input id=\"textinput\" name=\"textinput\" placeholder=\"\" class=\"form-control input-md\" required=\"\" type=\"text\"> </div> </div> <!-- Password input--> <div class=\"form-group\"> <label class=\"col-md-4 control-label\" for=\"passwordinput\">Password:</label> <div class=\"col-md-4\"> <input id=\"passwordinput\" name=\"passwordinput\" placeholder=\"\" class=\"form-control input-md\" required=\"\" type=\"password\"> <span class=\"help-block\">More than six strings</span> </div> </div> <!-- Multiple Radios --> <div class=\"form-group\"> <label class=\"col-md-4 control-label\" for=\"radios\">Sex:</label> <div class=\"col-md-4\"> <div class=\"radio\"> <label for=\"radios-0\"> <input name=\"radios\" id=\"radios-0\" value=\"1\" checked=\"checked\" type=\"radio\"> Male </label> </div> <div class=\"radio\"> <label for=\"radios-1\"> <input name=\"radios\" id=\"radios-1\" value=\"2\" type=\"radio\"> Female </label> </div> </div> </div> <!-- Button --> <div class=\"form-group\"> <label class=\"col-md-4 control-label\" for=\"singlebutton\"></label> <div class=\"col-md-4\"> <button id=\"singlebutton\" name=\"singlebutton\" class=\"btn btn-primary\">Submit</button> </div> </div> </fieldset> </form>",
  "create_time": "2014-11-24 23:09:25",
  "author": "Tester"
});
db.getCollection("forms").insert({
  "_id": ObjectId("547353d7f41c18501f000029"),
  "form_id": NumberInt(2),
  "form_code": "<form class=\"form-horizontal\"> <fieldset> <!-- Form Name --> <legend>Form Name</legend> <!-- Search input--> <div class=\"form-group\"> <label class=\"col-md-4 control-label\" for=\"searchinput\">Search:</label> <div class=\"col-md-4\"> <input id=\"searchinput\" name=\"searchinput\" placeholder=\"请输入关键词\" class=\"form-control input-md\" type=\"search\"> <p class=\"help-block\">KeyWord:</p> </div> </div> <!-- Text input--> <div class=\"form-group\"> <label class=\"col-md-4 control-label\" for=\"textinput\">UserName:</label> <div class=\"col-md-4\"> <input id=\"textinput\" name=\"textinput\" placeholder=\"\" class=\"form-control input-md\" required=\"\" type=\"text\"> </div> </div> <!-- Password input--> <div class=\"form-group\"> <label class=\"col-md-4 control-label\" for=\"passwordinput\">Password:</label> <div class=\"col-md-4\"> <input id=\"passwordinput\" name=\"passwordinput\" placeholder=\"\" class=\"form-control input-md\" required=\"\" type=\"password\"> <span class=\"help-block\">More than six strings</span> </div> </div> <!-- Multiple Radios --> <div class=\"form-group\"> <label class=\"col-md-4 control-label\" for=\"radios\">Sex:</label> <div class=\"col-md-4\"> <div class=\"radio\"> <label for=\"radios-0\"> <input name=\"radios\" id=\"radios-0\" value=\"1\" checked=\"checked\" type=\"radio\"> Male </label> </div> <div class=\"radio\"> <label for=\"radios-1\"> <input name=\"radios\" id=\"radios-1\" value=\"2\" type=\"radio\"> Female </label> </div> </div> </div> <!-- Button --> <div class=\"form-group\"> <label class=\"col-md-4 control-label\" for=\"singlebutton\"></label> <div class=\"col-md-4\"> <button id=\"singlebutton\" name=\"singlebutton\" class=\"btn btn-primary\">Submit</button> </div> </div> </fieldset> </form>",
  "create_time": "2014-11-24 23:50:47",
  "author": "Tester"
});
db.getCollection("forms").insert({
  "_id": ObjectId("547355f3f41c186c14000029"),
  "form_id": "3",
  "form_code": "<form class=\"form-horizontal\"> <fieldset> <!-- Form Name --> <legend>Form Name</legend> <!-- Search input--> <div class=\"form-group\"> <label class=\"col-md-4 control-label\" for=\"searchinput\">Search:</label> <div class=\"col-md-4\"> <input id=\"searchinput\" name=\"searchinput\" placeholder=\"请输入关键词\" class=\"form-control input-md\" type=\"search\"> <p class=\"help-block\">KeyWord:</p> </div> </div> <!-- Text input--> <div class=\"form-group\"> <label class=\"col-md-4 control-label\" for=\"textinput\">UserName:</label> <div class=\"col-md-4\"> <input id=\"textinput\" name=\"textinput\" placeholder=\"\" class=\"form-control input-md\" required=\"\" type=\"text\"> </div> </div> <!-- Password input--> <div class=\"form-group\"> <label class=\"col-md-4 control-label\" for=\"passwordinput\">Password:</label> <div class=\"col-md-4\"> <input id=\"passwordinput\" name=\"passwordinput\" placeholder=\"\" class=\"form-control input-md\" required=\"\" type=\"password\"> <span class=\"help-block\">More than six strings</span> </div> </div> <!-- Multiple Radios --> <div class=\"form-group\"> <label class=\"col-md-4 control-label\" for=\"radios\">Sex:</label> <div class=\"col-md-4\"> <div class=\"radio\"> <label for=\"radios-0\"> <input name=\"radios\" id=\"radios-0\" value=\"1\" checked=\"checked\" type=\"radio\"> Male </label> </div> <div class=\"radio\"> <label for=\"radios-1\"> <input name=\"radios\" id=\"radios-1\" value=\"2\" type=\"radio\"> Female </label> </div> </div> </div> <!-- Button --> <div class=\"form-group\"> <label class=\"col-md-4 control-label\" for=\"singlebutton\"></label> <div class=\"col-md-4\"> <button id=\"singlebutton\" name=\"singlebutton\" class=\"btn btn-primary\">Submit</button> </div> </div> </fieldset> </form>",
  "create_time": "2014-11-24 23:59:47",
  "author": "Tester"
});
db.getCollection("forms").insert({
  "_id": ObjectId("5475cbcdf41c181c1c000029"),
  "form_code": "<form class=\"form-horizontal\" action=\"http://formsmw.du/forms/home/submit_data\" method=\"post\">\r\n<fieldset>\r\n\r\n<!-- Form Name -->\r\n<legend>Form Name</legend>\r\n\r\n<!-- Text input-->\r\n<div class=\"form-group\">\r\n  <label class=\"col-md-4 control-label\" for=\"textinput\">UserName:</label>  \r\n  <div class=\"col-md-4\">\r\n  <input id=\"textinput\" name=\"textinput\" placeholder=\"\" class=\"form-control input-md\" required=\"\" type=\"text\">\r\n    \r\n  </div>\r\n</div>\r\n\r\n<!-- Password input-->\r\n<div class=\"form-group\">\r\n  <label class=\"col-md-4 control-label\" for=\"passwordinput\">Password</label>\r\n  <div class=\"col-md-4\">\r\n    <input id=\"passwordinput\" name=\"passwordinput\" placeholder=\"\" class=\"form-control input-md\" required=\"\" type=\"password\">\r\n    <span class=\"help-block\">More than six strings</span>\r\n  </div>\r\n</div>\r\n\r\n<!-- Button -->\r\n<div class=\"form-group\">\r\n  <label class=\"col-md-4 control-label\" for=\"singlebutton\">Login</label>\r\n  <div class=\"col-md-4\">\r\n    <button id=\"singlebutton\" name=\"singlebutton\" class=\"btn btn-primary\">Submit</button>\r\n  </div>\r\n</div>\r\n\r\n</fieldset>\r\n</form>\r\n",
  "create_time": "2014-11-26 20:47:09",
  "author": "tester"
});
db.getCollection("forms").insert({
  "_id": ObjectId("5475d3adf41c18fc19000029"),
  "form_code": "<form class=\"form-horizontal\" action=\"http://formsmw.du/forms/home/submit_data\" method=\"post\">\r\n<fieldset>\r\n\r\n<!-- Form Name -->\r\n<legend>Form Name</legend>\r\n\r\n<!-- Text input-->\r\n<div class=\"form-group\">\r\n  <label class=\"col-md-4 control-label\" for=\"textinput\">UserName</label>  \r\n  <div class=\"col-md-4\">\r\n  <input id=\"textinput\" name=\"textinput\" placeholder=\"\" class=\"form-control input-md\" required=\"\" type=\"text\">\r\n    \r\n  </div>\r\n</div>\r\n\r\n<!-- Password input-->\r\n<div class=\"form-group\">\r\n  <label class=\"col-md-4 control-label\" for=\"passwordinput\">Password</label>\r\n  <div class=\"col-md-4\">\r\n    <input id=\"passwordinput\" name=\"passwordinput\" placeholder=\"\" class=\"form-control input-md\" required=\"\" type=\"password\">\r\n    <span class=\"help-block\">More than six strings</span>\r\n  </div>\r\n</div>\r\n\r\n<!-- Multiple Radios -->\r\n<div class=\"form-group\">\r\n  <label class=\"col-md-4 control-label\" for=\"radios\">Multiple Radios</label>\r\n  <div class=\"col-md-4\">\r\n  <div class=\"radio\">\r\n    <label for=\"radios-0\">\r\n      <input name=\"radios\" id=\"radios-0\" value=\"1\" checked=\"checked\" type=\"radio\">\r\n      Option one\r\n    </label>\r\n\t</div>\r\n  <div class=\"radio\">\r\n    <label for=\"radios-1\">\r\n      <input name=\"radios\" id=\"radios-1\" value=\"2\" type=\"radio\">\r\n      Option two\r\n    </label>\r\n\t</div>\r\n  </div>\r\n</div>\r\n\r\n<!-- Button -->\r\n<div class=\"form-group\">\r\n  <label class=\"col-md-4 control-label\" for=\"singlebutton\">Single Button</label>\r\n  <div class=\"col-md-4\">\r\n    <button id=\"singlebutton\" name=\"singlebutton\" class=\"btn btn-primary\">Submit</button>\r\n  </div>\r\n</div>\r\n\r\n</fieldset>\r\n</form>\r\n",
  "create_time": "2014-11-26 21:20:44",
  "author": "jacky"
});
db.getCollection("forms").insert({
  "_id": ObjectId("54773204f41c18c010000029"),
  "form_code": "<form class=\"form-horizontal\" action=\"http://formsmw.du/forms/home/submit_data\" method=\"post\">\r\n<fieldset>\r\n\r\n<!-- Form Name -->\r\n<legend>Form Name</legend>\r\n\r\n<!-- Text input-->\r\n<div class=\"form-group\">\r\n  <label class=\"col-md-4 control-label\" for=\"textinput\">UserName:</label>  \r\n  <div class=\"col-md-4\">\r\n  <input id=\"textinput\" name=\"textinput\" placeholder=\"\" class=\"form-control input-md\" required=\"\" type=\"text\">\r\n    \r\n  </div>\r\n</div>\r\n\r\n<!-- Text input-->\r\n<div class=\"form-group\">\r\n  <label class=\"col-md-4 control-label\" for=\"textinput\">Password:</label>  \r\n  <div class=\"col-md-4\">\r\n  <input id=\"textinput\" name=\"textinput\" placeholder=\"\" class=\"form-control input-md\" required=\"\" type=\"text\">\r\n    \r\n  </div>\r\n</div>\r\n\r\n<!-- Button -->\r\n<div class=\"form-group\">\r\n  <label class=\"col-md-4 control-label\" for=\"singlebutton\">OK</label>\r\n  <div class=\"col-md-4\">\r\n    <button id=\"singlebutton\" name=\"singlebutton\" class=\"btn btn-primary\">Login</button>\r\n  </div>\r\n</div>\r\n\r\n</fieldset>\r\n</form>\r\n",
  "create_time": "2014-11-27 22:15:32",
  "author": "tester"
});

/** items records **/
db.getCollection("items").insert({
  "_id": ObjectId("5475cbe1f41c181c1c00002a"),
  "0": "5475cbcdf41c181c1c000029",
  "textinput": "Jack",
  "passwordinput": "123456"
});
db.getCollection("items").insert({
  "_id": ObjectId("5475d3c3f41c18fc1900002a"),
  "0": "5475d3adf41c18fc19000029",
  "textinput": "Jack",
  "passwordinput": "123456",
  "radios": "1"
});
db.getCollection("items").insert({
  "_id": ObjectId("5475e003f41c182005000029"),
  "0": "5475dff7a0dde9b86428f771",
  "textinput": "Jack",
  "passwordinput": "123456"
});
db.getCollection("items").insert({
  "_id": ObjectId("5475e473f41c185c19000029"),
  "0": "5475d3adf41c18fc19000029",
  "textinput": "username",
  "passwordinput": "password",
  "radios": "2"
});
db.getCollection("items").insert({
  "_id": ObjectId("5475e748f41c183c1c000029"),
  "0": "5475e473f41c185c19000029",
  "textinput": "user007",
  "passwordinput": "high123456",
  "radios": "1"
});
db.getCollection("items").insert({
  "_id": ObjectId("5475e91ff41c18b811000029"),
  "0": "5475d3adf41c18fc19000029",
  "textinput": "username",
  "passwordinput": "123456",
  "radios": "1"
});
db.getCollection("items").insert({
  "_id": ObjectId("5477321ef41c18c01000002a"),
  "0": "54773204f41c18c010000029",
  "textinput": "Password"
});

/** system.indexes records **/
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "formsmw.system.users",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "formsmw.forms",
  "name": "_id_"
});
db.getCollection("system.indexes").insert({
  "v": NumberInt(1),
  "key": {
    "_id": NumberInt(1)
  },
  "ns": "formsmw.items",
  "name": "_id_"
});

/** system.users records **/
db.getCollection("system.users").insert({
  "_id": ObjectId("547349982978bb616b87cd0b"),
  "user": "dbuser",
  "readOnly": false,
  "pwd": "57d66a790b7593ea39ace32d85d6f09a"
});
