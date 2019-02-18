<%@ Page Language="C#" AutoEventWireup="true" CodeFile="Hello.aspx.cs" Inherits="Hello" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
</head>
<body>
    <% if (Request.QueryString["nom"] != null && Request.QueryString["prenom"] != null) { %>
    <h1>Hello <% Response.Write(Request.QueryString["nom"] + " " + Request.QueryString["prenom"]); } %></h1>
    <form id="form1" runat="server">
        <div>
        </div>
    </form>
</body>
</html>
