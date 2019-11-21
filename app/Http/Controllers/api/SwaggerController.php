<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// url="http://localhost/hotels/public/api/" change in localhost 
// url="http://hotels360.herokuapp.com/api/"

/**
 * 
 * @OA\Info(
 *     title="Hotels API documentation example",
 *     version="1.0.0",
 *     @OA\Contact(
 *         email="abdo.zaky0@gmail.com"
 *     ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 * @OA\Tag(
 *     name="Pages",
 *     description="Some example pages",
 * )
 * @OA\Server(
 *     description="Laravel Swagger API server",
 *     url="http://hotels360.herokuapp.com/api/"
 * )
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     bearerFormat= "JWT",
 *     scheme="bearer"
 * )
 */
class SwaggerController extends Controller
{
    /**
 *  @OA\Post(
 *         path="/auth/register",
 *         tags={"register"},
 *     
 *         @OA\Parameter(
 *             name="name",
 *             in="query",
 *             required=true,
 *             @OA\Schema(
 *                 type="string"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="email",
 *             in="query",
 *             required=true,
 *             @OA\Schema(
 *                 type="string"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="password",
 *             in="query",
 *             required=true,
 *             @OA\Schema(
 *                 type="string"
 *             )
 *         ),    
 *        
 *         @OA\Response(
 *             response=200,
 *             description="Success",
 *             @OA\MediaType(
 *                 mediaType="application/json",
 *             )
 *         ),
 *         @OA\Response(
 *             response=401,
 *             description="Unauthorized"
 *         ),
 *         @OA\Response(
 *             response=400,
 *             description="Invalid request"
 *         ),
 *         @OA\Response(
 *             response=404,
 *             description="not found"
 *         ),
 *     )    
 *  @OA\Post(
 *         path="/auth/login",
 *         tags={"login"},
 *     
 *         @OA\Parameter(
 *             name="email",
 *             in="query",
 *             required=true,
 *             @OA\Schema(
 *                 type="string"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="password",
 *             in="query",
 *             required=true,
 *             @OA\Schema(
 *                 type="string"
 *             )
 *         ),    
 *        
 *         @OA\Response(
 *             response=200,
 *             description="Success",
 *             @OA\MediaType(
 *                 mediaType="application/json",
 *             )
 *         ),
 *         @OA\Response(
 *             response=401,
 *             description="Unauthorized"
 *         ),
 *         @OA\Response(
 *             response=400,
 *             description="Invalid request"
 *         ),
 *         @OA\Response(
 *             response=404,
 *             description="not found"
 *         ),
 *     )    
 * 
 * @OA\Post(
 *         path="/auth/password/email",
 *         tags={"Forget Password"},
 *         summary="Get Token if Email Exist Then Used it in Password Reset",
 * 
 *         @OA\Parameter(
 *             name="email",
 *             in="query",
 *             required=true,
 *             @OA\Schema(
 *                 type="string"
 *             )
 *         ),    
 *        
 *         @OA\Response(
 *             response=200,
 *             description="Success",
 *             @OA\MediaType(
 *                 mediaType="application/json",
 *             )
 *         ),
 *         @OA\Response(
 *             response=401,
 *             description="Unauthorized"
 *         ),
 *         @OA\Response(
 *             response=400,
 *             description="Invalid request"
 *         ),
 *         @OA\Response(
 *             response=404,
 *             description="not found"
 *         ),
 *     )    
 *  @OA\Post(
 *         path="/auth/password/reset",
 *         tags={"Password Reset"},
 *         summary="After Get token then Set Password",
 * 
 *         @OA\Parameter(
 *             name="email",
 *             in="query",
 *             required=true,
 *             @OA\Schema(
 *                 type="string"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="token",
 *             in="query",
 *             required=true,
 *             @OA\Schema(
 *                 type="string"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="password",
 *             in="query",
 *             required=true,
 *             @OA\Schema(
 *                 type="string"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="password_confirmation",
 *             in="query",
 *             required=true,
 *             @OA\Schema(
 *                 type="string"
 *             )
 *         ),    
 *        
 *         @OA\Response(
 *             response=200,
 *             description="Success",
 *             @OA\MediaType(
 *                 mediaType="application/json",
 *             )
 *         ),
 *         @OA\Response(
 *             response=401,
 *             description="Unauthorized"
 *         ),
 *         @OA\Response(
 *             response=400,
 *             description="Invalid request"
 *         ),
 *         @OA\Response(
 *             response=404,
 *             description="not found"
 *         ),
 *     )    
 *  @OA\Post(
 *         path="/auth/me",
 *         tags={"me"},
 *         summary="get all data about user by token",
 *         security={{"bearerAuth":{}}},
 *     
 *         @OA\Response(
 *             response=200,
 *             description="Success",
 *             @OA\MediaType(
 *                 mediaType="application/json",
 *             )
 *         ),
 *         @OA\Response(
 *             response=401,
 *             description="Unauthorized"
 *         ),
 *         @OA\Response(
 *             response=400,
 *             description="Invalid request"
 *         ),
 *         @OA\Response(
 *             response=404,
 *             description="not found"
 *         ),
 *     )    
 *  @OA\Post(
 *         path="/auth/logout",
 *         tags={"logout"},
 *         security={{"bearerAuth":{}}},
 *     
 *         @OA\Response(
 *             response=200,
 *             description="Success",
 *             @OA\MediaType(
 *                 mediaType="application/json",
 *             )
 *         ),
 *         @OA\Response(
 *             response=401,
 *             description="Unauthorized"
 *         ),
 *         @OA\Response(
 *             response=400,
 *             description="Invalid request"
 *         ),
 *         @OA\Response(
 *             response=404,
 *             description="not found"
 *         ),
 *     )    
 * @OA\Post(
 *         path="/searchhotels",
 *         tags={"Search"},
 *         summary="Get Data By Search Hotels Form (sorting by stars (desc))",
 *         operationId="",
 *     
 *         @OA\Parameter(
 *             name="city_name",
 *             in="query",
 *             description="hurghada or الغردقه or empty (all cities)",
 *             required=false,
 *             @OA\Schema(
 *                 type="string"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="check_in",
 *             in="query",
 *             description="like:(Y-m-d) 2019-11-23",
 *             required=true,
 *             @OA\Schema(
 *                 type="string"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="check_out",
 *             in="query",
 *             description="like:(Y-m-d) 2019-11-29",
 *             required=true,
 *             @OA\Schema(
 *                 type="string"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="adult",
 *             in="query",
 *             description="to show rooms just (single or double or triple)",
 *             required=true,
 *             @OA\Schema(
 *                 type="integer"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="nationality",
 *             in="query",
 *             description="User Nationality to Used it in PriceList. like (US-EG...) max:2 char",
 *             required=true,
 *             @OA\Schema(
 *                 type="string"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="locale",
 *             in="query",
 *             description="data language (En-Ar)",
 *             required=true,
 *             @OA\Schema(
 *                 type="string"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="user_type",
 *             in="query",
 *             description="(guest or trader) used it priceList ",
 *             required=true,
 *             @OA\Schema(
 *                 type="string"
 *             )
 *         ),    
 *         @OA\Response(
 *             response=200,
 *             description="Success",
 *             @OA\MediaType(
 *                 mediaType="application/json",
 *             )
 *         ),
 *         @OA\Response(
 *             response=401,
 *             description="Unauthorized"
 *         ),
 *         @OA\Response(
 *             response=400,
 *             description="Invalid request"
 *         ),
 *         @OA\Response(
 *             response=404,
 *             description="not found"
 *         ),
 *     )
 * 
 * @OA\Post(
 *         path="/hotelsfilter",
 *         tags={"Filter"},
 *         summary=" Get Data By Filter Form (price - hotel facilitise - room type) ",
 *         operationId="",
 *  
 *        @OA\Parameter(
 *             name="filter_price_from",
 *             in="query",
 *             description=" range price (from 2)  ",
 *             required=false,
 *             @OA\Schema(
 *                 type="integer"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="filter_price_to",
 *             in="query",
 *             description="range price (to 500) ",
 *             required=false,
 *             @OA\Schema(
 *                 type="integer"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="filter_hotel_facilities",
 *             in="query",
 *             description=" like : (wifi - car - parking -coffe) ",
 *             required=false,
 *             @OA\Schema(
 *                 type="string"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="filter_room_type",
 *             in="query",
 *             description=" like : (standar - delux) ",
 *             required=false,
 *             @OA\Schema(
 *                 type="string"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="city_name",
 *             in="query",
 *             description="hurghada or الغردقه",
 *             required=false,
 *             @OA\Schema(
 *                 type="string"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="check_in",
 *             in="query",
 *             description="like:(Y-m-d) 2019-11-23",
 *             required=true,
 *             @OA\Schema(
 *                 type="string"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="check_out",
 *             in="query",
 *             description="like:(Y-m-d) 2019-11-29",
 *             required=true,
 *             @OA\Schema(
 *                 type="string"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="adult",
 *             in="query",
 *             description="to show rooms just (single or double or triple)",
 *             required=true,
 *             @OA\Schema(
 *                 type="integer"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="nationality",
 *             in="query",
 *             description="User Nationality to Used it in PriceList. like (US-EG...) max:2 char",
 *             required=true,
 *             @OA\Schema(
 *                 type="string"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="locale",
 *             in="query",
 *             description="data language (En-Ar)",
 *             required=true,
 *             @OA\Schema(
 *                 type="string"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="user_type",
 *             in="query",
 *             description="(guest or trader) used it priceList ",
 *             required=true,
 *             @OA\Schema(
 *                 type="string"
 *             )
 *         ),    
 *         @OA\Response(
 *             response=200,
 *             description="Success",
 *             @OA\MediaType(
 *                 mediaType="application/json",
 *             )
 *         ),
 *         @OA\Response(
 *             response=401,
 *             description="Unauthorized"
 *         ),
 *         @OA\Response(
 *             response=400,
 *             description="Invalid request"
 *         ),
 *         @OA\Response(
 *             response=404,
 *             description="not found"
 *         ),
 *     )
 *  @OA\Post(
 *         path="/hotels",
 *         tags={"Hotels (default value) "},
 *         summary="Get Hotels without used search form by Set check_in = Today date - check_out = tomorrow date - adult = 1 - user_type = guest ",
 *         operationId="",
 *     
 *         @OA\Parameter(
 *             name="city_name",
 *             in="query",
 *             description="hurghada or الغردقه",
 *             required=false,
 *             @OA\Schema(
 *                 type="string"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="check_in",
 *             in="query",
 *             description="like:(Y-m-d) today",
 *             required=true,
 *             @OA\Schema(
 *                 type="string"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="check_out",
 *             in="query",
 *             description="like:(Y-m-d) tomorrow",
 *             required=true,
 *             @OA\Schema(
 *                 type="string"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="adult",
 *             in="query",
 *             description="to show rooms just (single or double or triple)",
 *             required=true,
 *             @OA\Schema(
 *                 type="integer"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="nationality",
 *             in="query",
 *             description="User Nationality to Used it in PriceList. like (US-EG...) max:2 char",
 *             required=true,
 *             @OA\Schema(
 *                 type="string"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="locale",
 *             in="query",
 *             description="data language (En-Ar)",
 *             required=true,
 *             @OA\Schema(
 *                 type="string"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="user_type",
 *             in="query",
 *             description="(guest or trader) used it priceList ",
 *             required=true,
 *             @OA\Schema(
 *                 type="string"
 *             )
 *         ),    
 *         @OA\Response(
 *             response=200,
 *             description="Success",
 *             @OA\MediaType(
 *                 mediaType="application/json",
 *             )
 *         ),
 *         @OA\Response(
 *             response=401,
 *             description="Unauthorized"
 *         ),
 *         @OA\Response(
 *             response=400,
 *             description="Invalid request"
 *         ),
 *         @OA\Response(
 *             response=404,
 *             description="not found"
 *         ),
 *     )
 * @OA\Post(
 *         path="/hotel",
 *         tags={"specific hotel"},
 *         summary=" Get Data By hotel_ID (price - adult - room type) ",
 *         operationId="",
 *  
 *        @OA\Parameter(
 *             name="hotel_id",
 *             in="query",
 *             required=true,
 *             @OA\Schema(
 *                 type="integer"
 *             )
 *         ),    
 *        @OA\Parameter(
 *             name="filter_price_from",
 *             in="query",
 *             description=" range price (from 2)  ",
 *             required=false,
 *             @OA\Schema(
 *                 type="integer"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="filter_price_to",
 *             in="query",
 *             description="range price (to 500) ",
 *             required=false,
 *             @OA\Schema(
 *                 type="integer"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="filter_room_type",
 *             in="query",
 *             description=" like : (standar - delux) ",
 *             required=false,
 *             @OA\Schema(
 *                 type="string"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="check_in",
 *             in="query",
 *             description="like:(Y-m-d) 2019-11-23",
 *             required=true,
 *             @OA\Schema(
 *                 type="string"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="check_out",
 *             in="query",
 *             description="like:(Y-m-d) 2019-11-29",
 *             required=true,
 *             @OA\Schema(
 *                 type="string"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="adult",
 *             in="query",
 *             description="to show rooms just (single or double or triple)",
 *             required=true,
 *             @OA\Schema(
 *                 type="integer"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="nationality",
 *             in="query",
 *             description="User Nationality to Used it in PriceList. like (US-EG...) max:2 char",
 *             required=true,
 *             @OA\Schema(
 *                 type="string"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="locale",
 *             in="query",
 *             description="data language (En-Ar)",
 *             required=true,
 *             @OA\Schema(
 *                 type="string"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="user_type",
 *             in="query",
 *             description="(guest or trader) used it priceList ",
 *             required=true,
 *             @OA\Schema(
 *                 type="string"
 *             )
 *         ),    
 *         @OA\Response(
 *             response=200,
 *             description="Success",
 *             @OA\MediaType(
 *                 mediaType="application/json",
 *             )
 *         ),
 *         @OA\Response(
 *             response=401,
 *             description="Unauthorized"
 *         ),
 *         @OA\Response(
 *             response=400,
 *             description="Invalid request"
 *         ),
 *         @OA\Response(
 *             response=404,
 *             description="not found"
 *         ),
 *     )
 * @OA\Post(
 *         path="/booknow",
 *         tags={"booknow"},
 *         summary=" check out ",
 *         operationId="",
 *         security={{"bearerAuth":{}}},
 *  
 *     
 *         @OA\Parameter(
 *             name="check_in",
 *             in="query",
 *             description="like:(Y-m-d) 2019-11-23",
 *             required=true,
 *             @OA\Schema(
 *                 type="string"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="check_out",
 *             in="query",
 *             description="like:(Y-m-d) 2019-11-29",
 *             required=true,
 *             @OA\Schema(
 *                 type="string"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="adults",
 *             in="query",
 *             required=true,
 *             @OA\Schema(
 *                 type="integer"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="childern",
 *             in="query",
 *             required=true,
 *             @OA\Schema(
 *                 type="integer"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="total_price",
 *             in="query",
 *             required=true,
 *             @OA\Schema(
 *                 type="integer"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="room_id",
 *             in="query",
 *             required=true,
 *             @OA\Schema(
 *                 type="integer"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="user_id",
 *             in="query",
 *             required=true,
 *             @OA\Schema(
 *                 type="integer"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="card_number",
 *             in="query",
 *             description=" digit:16 ",
 *             required=true,
 *             @OA\Schema(
 *                 type="integer"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="ccv",
 *             in="query",
 *             description=" digit:3 ",
 *             required=true,
 *             @OA\Schema(
 *                 type="integer"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="card_name",
 *             in="query",
 *             required=true,
 *             @OA\Schema(
 *                 type="string"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="street_address",
 *             in="query",
 *             required=true,
 *             @OA\Schema(
 *                 type="string"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="city",
 *             in="query",
 *             required=true,
 *             @OA\Schema(
 *                 type="string"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="contacts_name",
 *             in="query",
 *             required=true,
 *             @OA\Schema(
 *                 type="string"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="email",
 *             in="query",
 *             required=true,
 *             @OA\Schema(
 *                 type="string"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="post_code",
 *             in="query",
 *             description=" max:5 ",
 *             required=true,
 *             @OA\Schema(
 *                 type="integer"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="phone_number",
 *             in="query",
 *             description="max:13",
 *             required=true,
 *             @OA\Schema(
 *                 type="integer"
 *             )
 *         ),    
 *         @OA\Parameter(
 *             name="code",
 *             in="query",
 *             description="max:5",
 *             required=true,
 *             @OA\Schema(
 *                 type="integer"
 *             )
 *         ),    
 *         @OA\Response(
 *             response=200,
 *             description="Success",
 *             @OA\MediaType(
 *                 mediaType="application/json",
 *             )
 *         ),
 *         @OA\Response(
 *             response=401,
 *             description="Unauthorized"
 *         ),
 *         @OA\Response(
 *             response=400,
 *             description="Invalid request"
 *         ),
 *         @OA\Response(
 *             response=404,
 *             description="not found"
 *         ),
 *     )
 *  @OA\Get(
 *         path="/auth/redirect/facebook",
 *         tags={"Facebook"},
 *         summary="login by facebook return token",
 * 
 *           @OA\Response(
 *              response=200,
 *              description="successful operation"
 *       ),
 *        
 *     )    
 */
}
