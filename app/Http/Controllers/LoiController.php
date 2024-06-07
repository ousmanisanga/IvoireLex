<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoiRequest;
use App\Models\Loi;
use App\Models\Reference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lois = Loi::count();
        dd($lois) ;
        return view('lois.index');
    }

    public function searchRequest(Request $request){
        $searchInput = $request->searchInput;
        $lois = $this->getLois($request);

        $searchInput = $request->searchInput;
        $lois = Loi::where(function($query) use ($searchInput) {
            $query->where('titre', 'like', "%$searchInput%" );

            })
            ->get();

        return view('lois.results', compact('lois', 'searchInput'));
    }

    public function createLaw()
    {
        return view('lois.create');
    }

    // public function search(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $data = $this->getLois($request);

    //         $output = '';
    //         if (count($data) > 0) {
    //             $output = '
    //                 <table class="table">
    //                 <thead>
    //                 <tr>
    //                     <th scope="col">No</th>
    //                     <th scope="col">Titre</th>
    //                     <th scope="col">Action</th>
    //                 </tr>
    //                 </thead>
    //                 <tbody>';
    //             foreach ($data as $row) {
    //                 $output .= '
    //                         <tr>
    //                         <th scope="row">' . $row->id . '</th>
    //                         <td>' . $row->titre . '</td>
    //                         <td><a href="' . route('lois.show', $row->id) . '">Détails</a></td>
    //                         </tr>';
    //             }
    //             $output .= '
    //                 </tbody>
    //                 </table>';
    //         } else {
    //             $output .= 'No results';
    //         }


    //         return response()->json(['output' => $output]);
    //     }
    // }

    public function search(Request $request)
{
    if ($request->ajax()) {
        $data = Loi::where('id', 'like', '%' . $request->search . '%')
            ->orWhere('statut', 'like', '%' . $request->search . '%')
            ->orWhere('typeLoi', 'like', '%' . $request->search . '%')
            ->orWhere('titre', 'like', '%' . $request->search . '%')
            ->orWhere('datePublication', 'like', '%' . $request->search . '%')
            ->orWhere('numeroLoi', 'like', '%' . $request->search . '%')
            ->orWhere('annexe', 'like', '%' . $request->search . '%')
            ->orWhere('contenu', 'like', '%' . $request->search . '%')
            ->get();

        $output = '';
        if (count($data) > 0) {
            foreach ($data as $loi) {
                $output .= '
                <li>
                    <!-- Media -->
                    <div class="d-sm-flex">
                        <div class="flex-shrink-0 mb-3 mb-sm-0">
                            <span class="me-2">
                                <i class="bi-question-circle-fill text-primary fs-3"></i>
                            </span>
                        </div>

                        <div class="flex-grow-1 ms-sm-3">
                            <div class="mb-5">
                                <h5>' . $loi->typeLoi . ' n°' . $loi->numeroLoi . ' portant sur ' . $loi->titre . '</h5>
                                <p>
                                    ' . substr($loi->contenu, 0, 256) . '
                                </p>
                            </div>
                            <a class="link-bordered link-secondary" href="' . route('lois.show', $loi->numeroLoi) . '">
                                Consulter les détails
                            </a>
                        </div>
                    </div>
                    <!-- End Media -->
                </li>';
            }
        } else {
            $output .= 'Aucun résultat';
        }

        return response()->json(['output' => $output]);
    }
}



    public function storeLoi(LoiRequest $request)
    {
        $loi =Loi::create([
            'statut' => $request->input('statut'),
            'typeLoi' => $request->input('typeLoi'),
            'titre' => $request->input('titre'),
            'numeroLoi' => $request->input('numeroLoi'),
            'annexe' => $request->input('annexe'),
            'datePublication' => $request->input('datePublication'),
            'contenu' => $request->input('contenu'),
            'fichier' => $request->input('fichier'),
            'domaine' => $request->input('domaine'),
        ]);


        return redirect()->back()->with('success', 'Texte ajouté avec succès');
    }

    public function show($numeroLoi)
    {

        $loi = Loi::where('numeroLoi', $numeroLoi)->first();

        if ($loi) {
            $reference = Reference::where('lois_id', $loi->id)->with('lois')->get();


            return view('lois.show', compact('loi', 'reference'));

        } else {
            return view('lois.error'); // Vous devrez créer une vue pour gérer cette erreur

        }



    }

    // Rest of the methods...

    /**
     * @param Request $request
     * @return mixed
     */
    public function getLois(Request $request)
    {
        $lois = Loi::where('titre', 'like', '%' . $request->search . '%')->get();
        return $lois;
    }


    public function telechargerFichier($fichier)
    {
        $cheminVersFichier = storage_path('files/' . $fichier);

        if (file_exists($cheminVersFichier)) {
            return response()->download($cheminVersFichier);
        } else {
            // Gérer le cas où le fichier n'existe pas
            // Par exemple, renvoyer une erreur 404
            abort(404);
        }

    }

}
