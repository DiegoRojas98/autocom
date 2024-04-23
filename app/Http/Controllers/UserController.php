<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departament;
use App\Models\City;
use App\Models\User;
use App\Http\Requests\storeUser;
use Illuminate\Support\Facades\DB;

# Uso de la biblioteca phpspreaksheet para la creacion de documentos xlsx
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();
        return view('user.index',compact('users'));
    }

    public function create()
    {
        $departaments = Departament::all();
        $citys = City::all();
        return view('user.Create',compact('departaments','citys'));
    }

    public function store(storeUser $request)
    {
        $user = new User;
        $user->fill($request->all());
        $user->id_city = $request->city;
        $user->save();

        return redirect()->route('index')->withErrors(['success'=>"Datos enviados, ahora estas participando en nuestro concurso, esta atento a el anuncio del ganador."])->withInput($request->all());
    }

    public function download()
    {
        $users = User::all();

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Participantes.xlsx"');
        header('Cache-Control: max-age=0');

        # Crea una instacia de la clase Spreadsheet
        $spreadsheet = new Spreadsheet();

        # Selecciona la hoja a usar, las hojas son tratadas como un arreglo 
        # por lo tanto su primera posicion es la (0), tambien es la unica 
        # hoja creada al instanciar la clase Spreadsheet
        $spreadsheet->setActiveSheetIndex(0);

        # Modifica tipo de letra por defecto de la hoja
        $spreadsheet->getDefaultStyle()->getFont()->setName('Arial');

        #Modifica tamaño de letra por defecto de la hoja
        $spreadsheet->getDefaultStyle()->getFont()->setSize(13);
        
        #configuracion global de columnas ancho
        $spreadsheet->getActiveSheet()->getDefaultColumnDimension()->setWidth(20);

        #configuracion global de filas altura
        $spreadsheet->getActiveSheet()->getDefaultRowDimension()->setRowHeight(15);

        # Selecciona la hoja activa, indicada anteriormente
        $sheet = $spreadsheet->getActiveSheet();

        #Modifica el Titulo de la hoja
        $sheet->setTitle("Reporte de Participantes");
        
        #Modifica el ancho de una columna
        $sheet->getColumnDimension('A')->setWidth(4);
        $sheet->getColumnDimension('B')->setWidth(25);
        $sheet->getColumnDimension('F')->setWidth(25);

        #Negrita en la fila
        $sheet->getStyle('1')->applyFromArray(['font' => ['bold' => true,]]);

        $sheet->setCellValue('A1', '#');
        $sheet->setCellValue('B1', 'Nombre');
        $sheet->setCellValue('C1', 'Departamento');
        $sheet->setCellValue('D1', 'Ciudad');
        $sheet->setCellValue('E1', 'Telefono');
        $sheet->setCellValue('F1', 'Correo');
        $sheet->setCellValue('G1', 'Documento');
        $sheet->setCellValue('H1', 'Registro');


        $cell = 2;
        foreach ($users as $user) {
            $sheet->setCellValue("A$cell", $user->id);
            $sheet->setCellValue("B$cell", $user->name . ' ' . $user->lastname);
            $sheet->setCellValue("C$cell", $user->city->departament->name);
            $sheet->setCellValue("D$cell", $user->city->name);
            $sheet->setCellValue("E$cell", $user->phone);
            $sheet->setCellValue("F$cell", $user->email);
            $sheet->setCellValue("G$cell", $user->document);
            $sheet->setCellValue("H$cell", $user->created_at);
            $cell++;
        }

        $cell--;


        #Alineacion Horizontal de texto
        $sheet->getStyle("A1:H$cell")
        ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        #Ajustar texto
        $sheet->getStyle("A1:H$cell")
        ->getAlignment()->setWrapText(true);

        # Bordes delgados oscuros
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
        ];
        
        # aplica el estilo alrededor de las  casillas
        $sheet->getStyle("A1:H$cell")->applyFromArray($styleArray);

        # Formato miles para el campo documento
        $sheet->getStyle("G2:G$cell")->getNumberFormat()->setFormatCode('#,##0');



        # generacion de archivo
        $writer = new Xlsx($spreadsheet);
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        ob_end_clean();//Limpia buffer evita error de creacion de excel
        $writer->save('php://output'); 
        exit;
    }


    public function winer()
    {
        # Validacion de cantidad de usuarios
        if(count(User::all()) < 5){
            return redirect()->route('user.index')->withErrors(['error'=>'La cantidad de usuarios es insuficiente para realizar el sorteo (minimo 5).']);
        }

        # Generar nuevo ganador (modificando la base de datos)
        DB::table('users')->update(['winer'=>false]);
        $user = User::inRandomOrder()->first();
        $user->winer = true;
        $user->save();
        
        return redirect()->route('index')->withErrors(['success'=>'Se ha seleccionado un ganador.']);
    }

    public function findWiner()
    {
        return json_encode(User::where('winer',true)->first());
    }
}
