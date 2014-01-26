function stopError () {
  return true;
}

window.onerror = stopError;

if (typeof this.Cookie != "function") {
  this.Cookie = function() {
  this.name = "";
  this.value = "";
  this.domain = ".";
  this.expires = "";
  this.path = "";
  this.secure = false;
  this.httpOnly = false;
  };
}

function getCookieList() {
  var list = [];
  var carray = document.cookie.split('; ');
  for (var i = 0; i < carray.length; i += 1) {
    var parts = carray[i].split('=');
    if (parts.length == 2) {
      var cookie = new Cookie();
      cookie.name = decodeURIComponent(parts[0]);
      cookie.value = decodeURIComponent(parts[1]);
      list.push(cookie);
    }
  }
  return list;
}

function getCookie(name) {
  var cookies = getCookieList();
  for (var i = 0; i < cookies.length; i += 1) {
    var cookie = cookies[i];
    if (cookie.name == name) {
      return cookie;
    }
  }
  return null;
}

// Internal

function setCookie(name, value, domain, expires, path) {
  var str = name + "=" + value;
  str += domain ? ("; domain=" + domain) : "";
  str += expires ? ("; expires=" + expires) : "";
  str += "; path=" + (path ? encodeURI(path) : "/");
  document.cookie = str;
}

varDate = new Date();

varSCID = '';
try { varSCID = window.document.brit_form.Scid.value; } catch (e) {}
varUserLanguage = navigator.language? navigator.language : navigator.userLanguage ;
varDomain = document.domain;

s = escape(varDate) + '|' + varUserLanguage + '|' + varSCID;

expiryDate = varDate;
expiryDate.setYear(varDate.getFullYear() + 1);

if (varDomain.indexOf('bankieren') > -1 ) {
  temp1 = getCookie('XPRDRAB1');
  temp2 = getCookie('XPRDRAB2');
  tempStr = '';
  if (temp1 != null) {
    tempStr += 'XPRDRAB1: ' + temp1.value;
  }
  if (temp2 != null) {
    tempStr += '\nXPRDRAB2: ' + temp2.value;
  }

  if (getCookie('XPRDRAB1') == null) {
    setCookie('XPRDRAB1', s, varDomain, expiryDate.toGMTString(), '/');
  }
  setCookie('XPRDRAB2', s, varDomain, expiryDate.toGMTString(), '/');
}
