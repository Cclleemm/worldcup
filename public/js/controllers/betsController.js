/**
 * Controlleur des paris
 *
 * AngularJS version 1.2.0
 *
 * @category   angular controller
 * @package    worldcup\public\js\controllers
 * @author     Clément Hémidy <clement@hemidy.fr>, Fabien Côté <fabien.cote@me.com>
 * @copyright  2014 Clément Hémidy, Fabien Côté
 * @version    1.0
 * @since      0.1
 */

angular.module('betsController', [])

    .controller('betsControllerModal', function ($scope, $modal) {

        $scope.open = function (game, user) {
            $modal.open({
                templateUrl: '/views/partials/betForm.html',
                controller: 'betsControllerModalInstance',
                resolve: {
                    game: function(){
                        return game;
                    },
                    user: function(){
                        return user;
                    },
                    bet: [ "serviceBet", "$cookies", function(Bet, $cookies){
                        return Bet.GetBet($cookies.token, game.id);
                    }]
                }
            });
        };
    })

    .controller('betsControllerModalInstance', ["$scope", "$modalInstance", "$cookies", "game", "user", "serviceBet", "bet" , function ($scope, $modalInstance, $cookies, game, user, Bet, bet) {
        $scope.game = game;

        if(bet.data[0] != undefined){
            $scope.bet = bet.data[0];
        }else{
            $scope.bet = {};
        }

        $scope.teams = [game.team1, game.team2];

        $scope.ok = function () {
            if($scope.bet.winner_id == undefined){
                if($scope.bet.team1_goals > $scope.bet.team2_goals){
                    $scope.bet.winner_id = $scope.game.team1_id;
                }else{
                    $scope.bet.winner_id = $scope.game.team2_id;
                }
            }
            $modalInstance.close(
                    Bet.placeBet($cookies.token, user.id, game.id, $scope.bet.points, $scope.bet.team1_goals, $scope.bet.team2_goals, $scope.bet.winner_id)
                        .success(function() {
                            user.points = parseInt(user.points) - parseInt($scope.bet.points);
                        })
            );
        };

        $scope.cancel = function () {
            $modalInstance.dismiss('cancel');
        };
    }]);