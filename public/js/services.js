/**
 * Services angularJS
 *
 * AngularJS version 1.2.0
 *
 * @category   angular controller
 * @package    worldcup\public\js
 * @author     Clément Hémidy <clement@hemidy.fr>, Fabien Côté <fabien.cote@me.com>
 * @copyright  2014 Clément Hémidy, Fabien Côté
 * @version    0.1
 * @since      0.1
 */


angular.module('services', [])

    .factory('serviceUser', function($http, $rootScope) {
        return {

            authorize: function(accessLevel, role) {
                if(role === undefined)
                    if($rootScope.user != null)
                        role = userRoles.user;
                    else
                        role = userRoles.public;

                return accessLevel & role;
            },

            getUser : function(id, token) {
                return $http.get('/api/users/' + id + '?token=' + token);
            },

            login : function(email, pass) {
                return $http({
                    method: 'POST',
                    url: '/api/users/login',
                    headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                    data: $.param({"email" : email, "password" : pass})
                });
            },

            logout : function(token) {
                return $http.get('/api/users/logout?token=' + token);
            },

            register : function(email, pass, first, last) {
                return $http({
                    method: 'POST',
                    url: 'api/users',
                    headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                    data: $.param({"email" : email, "password" : pass, "firstname" : first, "lastname" : last})
                });
            }

        }
    })

    .factory('serviceGame', function($http) {
        return {
            GetNext : function(token){
                return $http.get('api/games?token=' + token + '&winner_id=null&team1_id!=null&team2_id!=null&orderBy=date&order=ASC');
            }
        }
    })