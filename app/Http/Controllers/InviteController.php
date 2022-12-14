<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Invite;
use App\Models\Invitation;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class InviteController extends Controller
{
    /**
    * @OA\Post(
    * path="/api/invite",
    * summary="Send Invite",
    * description="This api will send hash link in the form of short URL via e-mail and it can be used only once",
    * operationId="Send Invitation",
    * * @OA\RequestBody(
     *    required=true,
     *    description="Pass user credentials",
     *    @OA\JsonContent(
     *       @OA\Property(property="url", type="string", format="string", example="https://www.ajio.com/?utm_source=promo&utm_medium=wa&utm_campaign=WA_d-09122022_VF_B2_BBS"),
     *       @OA\Property(property="email", type="array", 
     *  *  @OA\Items(
     *          type="string",
     *          example="priyankatailor2389@gmail.com"
     *     ),
     *     @OA\Items(
     *          type="string",
     *          example="priyankatailor23897@gmail.com"
     *      ),
     * ),
     * 
     *    ),
     * ),
    * @OA\Response(
    *    response=200,
    *    description="Invitation is sent to your email, please check your inbox",
    *   @OA\JsonContent(
    *        @OA\Property(property="success", type="string", example="true"),
    *        @OA\Property(property="message", type="string", example="Invitation is sent to your email, please check your inbox"),
   

    *        )
    
    
    *     )
    * )
     */
    public function sendInvitation(Request $request) 
    {
        $builder = new \AshAllenDesign\ShortURL\Classes\Builder();
        $shortURLObject = $builder->destinationUrl($request->url)->trackVisits()->make();

        $emails = $request->email;

        if(!empty($emails)){
            foreach($emails as $email){
                 $invitation = Invitation::create([
                    'email' => $email,
                    'link' =>$shortURLObject->default_short_url
                ]);

                $data=['email'=>$email,
                       'link' =>$shortURLObject->default_short_url
                      ];

                if ($invitation) {
                    \Mail::to($email)->send(new Invite($data));
                } 
            }
            return new JsonResponse(
                [
                    'success' => true, 
                    'message' => "Invitation is sent to your email, please check your inbox"
                ], 
                200
            );
           
        }else{
            return new JsonResponse(['success' => false, 'message' => 'email is required'], 422);
        }
        
        
    }


    public function trackVisits(Request $request){
        $shortURLObject = \AshAllenDesign\ShortURL\Models\ShortURL::findByKey($request->url_key);
        //echo "<pre>";print_r($shortURLObject->visits);echo "</pre>";exit;

        if(is_null($shortURLObject)){
            return new JsonResponse(['success' => false, 'message' => 'URL not found'], 422);
        }else{
            return new JsonResponse(
                [
                    'success' => true, 
                    'message' => "URL data fetched sucessfully",
                    'data'    => $shortURLObject
                ], 
                200
            );
        }

    }
}
