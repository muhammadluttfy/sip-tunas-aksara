<?php

namespace App\Http\Controllers\Administrator;

use App\Models\Art;
use App\Models\Raport;
use App\Models\Student;
use App\Models\Cognitive;
use App\Models\Predicate;
use Illuminate\Http\Request;
use App\Models\LanguageAbility;
use App\Models\PhysicalMotoric;
use App\Models\BehaviorFormation;
use App\Http\Controllers\Controller;
use PHPUnit\Framework\MockObject\Builder\Stub;

class RaportController extends Controller
{
    public function index(Student $student)
    {
        //
    }


    public function create(Student $student)
    {
        return view('administrator.raport.create', [
            'title' => 'Tambah Raport Peserta Didik',
            // 'student' => Student::find($id),
            'student' => $student,
            'predicates' => Predicate::all(),
            // get 2 years back from 2 years now
            'years' => range(date('Y') - 2, date('Y')),
        ]);
    }


    public function store(Request $request, Student $student)
    {
        // dd($request->all());

        $request->validate([
            'semester' => 'required',
            'tahun_ajaran' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ]);

        BehaviorFormation::create([
            'point_1' => $request->point_1,
            'point_2' => $request->point_2,
            'point_3' => $request->point_3,
            'point_4' => $request->point_4,
            'point_5' => $request->point_5,
            'point_6' => $request->point_6,
            'point_7' => $request->point_7,
            'point_8' => $request->point_8,
            'point_9' => $request->point_9,
            'point_10' => $request->point_10,
            'point_11' => $request->point_11,
            'point_12' => $request->point_12,
            'point_13' => $request->point_13,
            'point_14' => $request->point_14,
            'point_15' => $request->point_15,
            'point_16' => $request->point_16,
            'point_17' => $request->point_17,
            'point_18' => $request->point_18,
            'point_19' => $request->point_19,
            'point_20' => $request->point_20,
            'point_21' => $request->point_21,
            'point_22' => $request->point_22,
            'point_23' => $request->point_23,
            'point_24' => $request->point_24,
            'point_25' => $request->point_25,
            'point_26' => $request->point_26,
            'point_27' => $request->point_27,
            'point_28' => $request->point_28,
            'point_29' => $request->point_29,
            'point_30' => $request->point_30,
            'point_31' => $request->point_31,
            'point_32' => $request->point_32,
            'point_33' => $request->point_33,
            'point_34' => $request->point_34,
            'point_35' => $request->point_35,
            'point_36' => $request->point_36,
            'point_37' => $request->point_37,
            'point_38' => $request->point_38,
            'point_39' => $request->point_39,
            'point_40' => $request->point_40,
            'point_41' => $request->point_41,
        ]);
        LanguageAbility::create([
            'point_1' => $request->point_42,
            'point_2' => $request->point_43,
            'point_3' => $request->point_44,
            'point_4' => $request->point_45,
            'point_5' => $request->point_46,
            'point_6' => $request->point_47,
            'point_7' => $request->point_48,
            'point_8' => $request->point_49,
            'point_9' => $request->point_50,
            'point_10' => $request->point_51,
            'point_11' => $request->point_52,
            'point_12' => $request->point_53,
            'point_13' => $request->point_54,
            'point_14' => $request->point_55,
            'point_15' => $request->point_56,
            'point_16' => $request->point_57,
            'point_17' => $request->point_58,
            'point_18' => $request->point_59,
            'point_19' => $request->point_60,
            'point_20' => $request->point_61,
        ]);
        Cognitive::create([
            'point_1'  => $request->point_62,
            'point_2'  => $request->point_63,
            'point_3'  => $request->point_64,
            'point_4'  => $request->point_65,
            'point_5'  => $request->point_66,
            'point_6'  => $request->point_67,
            'point_7'  => $request->point_68,
            'point_8'  => $request->point_69,
            'point_9'  => $request->point_70,
            'point_10'  => $request->point_71,
            'point_11'  => $request->point_72,
            'point_12'  => $request->point_73,
            'point_13'  => $request->point_74,
            'point_14'  => $request->point_75,
            'point_15'  => $request->point_76,
            'point_16'  => $request->point_77,
            'point_17'  => $request->point_78,
            'point_18'  => $request->point_79,
            'point_19'  => $request->point_80,
            'point_20'  => $request->point_81,
            'point_21'  => $request->point_82,
            'point_22'  => $request->point_83,
            'point_23'  => $request->point_84,
            'point_24'  => $request->point_85,
        ]);
        PhysicalMotoric::create([
            'point_1' => $request->point_86,
            'point_2' => $request->point_87,
            'point_3' => $request->point_88,
            'point_4' => $request->point_89,
            'point_5' => $request->point_90,
            'point_6' => $request->point_91,
            'point_7' => $request->point_92,
            'point_8' => $request->point_93,
            'point_9' => $request->point_94,
            'point_10' => $request->point_95,
            'point_11' => $request->point_96,
            'point_12' => $request->point_97,
            'point_13' => $request->point_98,
            'point_14' => $request->point_99,
            'point_15' => $request->point_100,
            'point_16' => $request->point_101,
            'point_17' => $request->point_102,
            'point_18' => $request->point_103,
            'point_19' => $request->point_104,
            'point_20' => $request->point_105,
            'point_21' => $request->point_106,
            'point_22' => $request->point_107,
            'point_23' => $request->point_108,
            'point_24' => $request->point_109,
            'point_25' => $request->point_110,
            'point_26' => $request->point_111,
        ]);
        Art::create([
            'point_1' => $request->point_112,
            'point_2' => $request->point_113,
            'point_3' => $request->point_114,
            'point_4' => $request->point_115,
            'point_5' => $request->point_116,
            'point_6' => $request->point_117,
            'point_7' => $request->point_118,
            'point_8' => $request->point_119,
            'point_9' => $request->point_120,
            'point_10' => $request->point_121,
            'point_11' => $request->point_122,
            'point_12' => $request->point_123,
            'point_13' => $request->point_124,
            'point_14' => $request->point_125,
            'point_15' => $request->point_126,
            'point_16' => $request->point_127,
            'point_17' => $request->point_128,
            'point_18' => $request->point_129,
            'point_19' => $request->point_130,
            'point_20' => $request->point_131,
            'point_21' => $request->point_132,
            'point_22' => $request->point_133,
            'point_23' => $request->point_134,
            'point_24' => $request->point_135,
            'point_25' => $request->point_136,
            'point_26' => $request->point_137,
            'point_27' => $request->point_138,
            'point_28' => $request->point_139,
        ]);

        // create raports
        Raport::create([
            'student_id' => $student->id,
            'semester_id' => $request->semester,
            'behavior_formation_id' => BehaviorFormation::latest()->first()->id,
            'language_ability_id' => LanguageAbility::latest()->first()->id,
            'cognitive_id' => Cognitive::latest()->first()->id,
            'physical_motoric_id' => PhysicalMotoric::latest()->first()->id,
            'art_id' => Art::latest()->first()->id,
            'tahun_ajaran' => $request->tahun_ajaran,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
        ]);
        return redirect()->route('raport.show', $student->username)->with('success', 'Data berhasil ditambahkan');
    }


    public function show(Student $student)
    {
        return view('administrator.raport.show', [
            'title' => 'Raport' . ' | ' . $student->nama_lengkap,
            'student' => $student,
            // get raport by student and semester 1
            'raport_1' => Raport::where('student_id', $student->id)->where('semester_id', 1)->first(),
            'raport_2' => Raport::where('student_id', $student->id)->where('semester_id', 2)->first(),
            'raport_3' => Raport::where('student_id', $student->id)->where('semester_id', 3)->first(),
            'raport_4' => Raport::where('student_id', $student->id)->where('semester_id', 4)->first(),
            'raport_5' => Raport::where('student_id', $student->id)->where('semester_id', 5)->first(),
            'raport_6' => Raport::where('student_id', $student->id)->where('semester_id', 6)->first(),
            'raport_7' => Raport::where('student_id', $student->id)->where('semester_id', 7)->first(),
            'raport_8' => Raport::where('student_id', $student->id)->where('semester_id', 8)->first(),
            // get 2 years back from 2 years now
            'years' => range(date('Y') - 2, date('Y')),
        ]);
    }


    // START : Semester 1
    public function editSemester1(Student $student)
    {
        return view('administrator.raport.edit-semester-1', [
            'title' => 'Edit Raport Peserta Didik',
            'student' => Student::find($student->id),
            'predicates' => Predicate::all(),
            'raport_1' => Raport::where('student_id', $student->id)->where('semester_id', 1)->first(),
            // get 2 years back from 2 years now
            'years' => range(date('Y') - 2, date('Y')),
        ]);
    }

    public function updateSemester1(Request $request, Student $student)
    {

        $request->validate([
            'semester' => 'required',
            'tahun_ajaran' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ]);

        $raport_1 = Raport::where('student_id', $student->id)->where('semester_id', 1)->first();
        $raport_1_Id = $raport_1->id;
        // get raport id
        $raport_1 = Raport::find($raport_1_Id);

        $behavior_formation = BehaviorFormation::find($raport_1->behavior_formation_id);
        $behavior_formation->update([
            'point_1' => $request->point_1,
            'point_2' => $request->point_2,
            'point_3' => $request->point_3,
            'point_4' => $request->point_4,
            'point_5' => $request->point_5,
            'point_6' => $request->point_6,
            'point_7' => $request->point_7,
            'point_8' => $request->point_8,
            'point_9' => $request->point_9,
            'point_10' => $request->point_10,
            'point_11' => $request->point_11,
            'point_12' => $request->point_12,
            'point_13' => $request->point_13,
            'point_14' => $request->point_14,
            'point_15' => $request->point_15,
            'point_16' => $request->point_16,
            'point_17' => $request->point_17,
            'point_18' => $request->point_18,
            'point_19' => $request->point_19,
            'point_20' => $request->point_20,
            'point_21' => $request->point_21,
            'point_22' => $request->point_22,
            'point_23' => $request->point_23,
            'point_24' => $request->point_24,
            'point_25' => $request->point_25,
            'point_26' => $request->point_26,
            'point_27' => $request->point_27,
            'point_28' => $request->point_28,
            'point_29' => $request->point_29,
            'point_30' => $request->point_30,
            'point_31' => $request->point_31,
            'point_32' => $request->point_32,
            'point_33' => $request->point_33,
            'point_34' => $request->point_34,
            'point_35' => $request->point_35,
            'point_36' => $request->point_36,
            'point_37' => $request->point_37,
            'point_38' => $request->point_38,
            'point_39' => $request->point_39,
            'point_40' => $request->point_40,
            'point_41' => $request->point_41,
        ]);

        $language_ability = LanguageAbility::find($raport_1->language_ability_id);
        $language_ability->update([
            'point_1' => $request->point_42,
            'point_2' => $request->point_43,
            'point_3' => $request->point_44,
            'point_4' => $request->point_45,
            'point_5' => $request->point_46,
            'point_6' => $request->point_47,
            'point_7' => $request->point_48,
            'point_8' => $request->point_49,
            'point_9' => $request->point_50,
            'point_10' => $request->point_51,
            'point_11' => $request->point_52,
            'point_12' => $request->point_53,
            'point_13' => $request->point_54,
            'point_14' => $request->point_55,
            'point_15' => $request->point_56,
            'point_16' => $request->point_57,
            'point_17' => $request->point_58,
            'point_18' => $request->point_59,
            'point_19' => $request->point_60,
            'point_20' => $request->point_61,
        ]);

        $cognitive = Cognitive::find($raport_1->cognitive_id);
        $cognitive->update([
            'point_1'  => $request->point_62,
            'point_2'  => $request->point_63,
            'point_3'  => $request->point_64,
            'point_4'  => $request->point_65,
            'point_5'  => $request->point_66,
            'point_6'  => $request->point_67,
            'point_7'  => $request->point_68,
            'point_8'  => $request->point_69,
            'point_9'  => $request->point_70,
            'point_10'  => $request->point_71,
            'point_11'  => $request->point_72,
            'point_12'  => $request->point_73,
            'point_13'  => $request->point_74,
            'point_14'  => $request->point_75,
            'point_15'  => $request->point_76,
            'point_16'  => $request->point_77,
            'point_17'  => $request->point_78,
            'point_18'  => $request->point_79,
            'point_19'  => $request->point_80,
            'point_20'  => $request->point_81,
            'point_21'  => $request->point_82,
            'point_22'  => $request->point_83,
            'point_23'  => $request->point_84,
            'point_24'  => $request->point_85,
        ]);

        $physical_motoric = PhysicalMotoric::find($raport_1->physical_motoric_id);
        $physical_motoric->update([
            'point_1' => $request->point_86,
            'point_2' => $request->point_87,
            'point_3' => $request->point_88,
            'point_4' => $request->point_89,
            'point_5' => $request->point_90,
            'point_6' => $request->point_91,
            'point_7' => $request->point_92,
            'point_8' => $request->point_93,
            'point_9' => $request->point_94,
            'point_10' => $request->point_95,
            'point_11' => $request->point_96,
            'point_12' => $request->point_97,
            'point_13' => $request->point_98,
            'point_14' => $request->point_99,
            'point_15' => $request->point_100,
            'point_16' => $request->point_101,
            'point_17' => $request->point_102,
            'point_18' => $request->point_103,
            'point_19' => $request->point_104,
            'point_20' => $request->point_105,
            'point_21' => $request->point_106,
            'point_22' => $request->point_107,
            'point_23' => $request->point_108,
            'point_24' => $request->point_109,
            'point_25' => $request->point_110,
            'point_26' => $request->point_111,
        ]);

        $art = Art::find($raport_1->art_id);
        $art->update([
            'point_1' => $request->point_112,
            'point_2' => $request->point_113,
            'point_3' => $request->point_114,
            'point_4' => $request->point_115,
            'point_5' => $request->point_116,
            'point_6' => $request->point_117,
            'point_7' => $request->point_118,
            'point_8' => $request->point_119,
            'point_9' => $request->point_120,
            'point_10' => $request->point_121,
            'point_11' => $request->point_122,
            'point_12' => $request->point_123,
            'point_13' => $request->point_124,
            'point_14' => $request->point_125,
            'point_15' => $request->point_126,
            'point_16' => $request->point_127,
            'point_17' => $request->point_128,
            'point_18' => $request->point_129,
            'point_19' => $request->point_130,
            'point_20' => $request->point_131,
            'point_21' => $request->point_132,
            'point_22' => $request->point_133,
            'point_23' => $request->point_134,
            'point_24' => $request->point_135,
            'point_25' => $request->point_136,
            'point_26' => $request->point_137,
            'point_27' => $request->point_138,
            'point_28' => $request->point_139,
        ]);



        // update raport
        $raport_1->behavior_formation_id = $behavior_formation->id;
        $raport_1->language_ability_id = $language_ability->id;
        $raport_1->cognitive_id = $cognitive->id;
        $raport_1->physical_motoric_id = $physical_motoric->id;
        $raport_1->art_id = $art->id;
        $raport_1->semester_id = $request->semester;
        $raport_1->tahun_ajaran = $request->tahun_ajaran;
        $raport_1->tanggal_mulai = $request->tanggal_mulai;
        $raport_1->tanggal_selesai = $request->tanggal_selesai;
        $raport_1->save();

        return redirect()->route('raport.show', $student->username)->with('success', 'Data berhasil diubah');
    }
    // END : Semester 1


    // START : Semester 2
    public function editSemester2(Student $student)
    {
        return view('administrator.raport.edit-semester-2', [
            'title' => 'Edit Raport Peserta Didik',
            'student' => Student::find($student->id),
            'predicates' => Predicate::all(),
            'raport_2' => Raport::where('student_id', $student->id)->where('semester_id', 2)->first(),
            // get 2 years back from 2 years now
            'years' => range(date('Y') - 2, date('Y')),
        ]);
    }

    public function updateSemester2(Request $request, Student $student)
    {

        $request->validate([
            'semester' => 'required',
            'tahun_ajaran' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ]);

        $raport_2 = Raport::where('student_id', $student->id)->where('semester_id', 2)->first();
        $raport_2_Id = $raport_2->id;
        // get raport id
        $raport_2 = Raport::find($raport_2_Id);

        $behavior_formation = BehaviorFormation::find($raport_2->behavior_formation_id);
        $behavior_formation->update([
            'point_1' => $request->point_1,
            'point_2' => $request->point_2,
            'point_3' => $request->point_3,
            'point_4' => $request->point_4,
            'point_5' => $request->point_5,
            'point_6' => $request->point_6,
            'point_7' => $request->point_7,
            'point_8' => $request->point_8,
            'point_9' => $request->point_9,
            'point_10' => $request->point_10,
            'point_11' => $request->point_11,
            'point_12' => $request->point_12,
            'point_13' => $request->point_13,
            'point_14' => $request->point_14,
            'point_15' => $request->point_15,
            'point_16' => $request->point_16,
            'point_17' => $request->point_17,
            'point_18' => $request->point_18,
            'point_19' => $request->point_19,
            'point_20' => $request->point_20,
            'point_21' => $request->point_21,
            'point_22' => $request->point_22,
            'point_23' => $request->point_23,
            'point_24' => $request->point_24,
            'point_25' => $request->point_25,
            'point_26' => $request->point_26,
            'point_27' => $request->point_27,
            'point_28' => $request->point_28,
            'point_29' => $request->point_29,
            'point_30' => $request->point_30,
            'point_31' => $request->point_31,
            'point_32' => $request->point_32,
            'point_33' => $request->point_33,
            'point_34' => $request->point_34,
            'point_35' => $request->point_35,
            'point_36' => $request->point_36,
            'point_37' => $request->point_37,
            'point_38' => $request->point_38,
            'point_39' => $request->point_39,
            'point_40' => $request->point_40,
            'point_41' => $request->point_41,
        ]);

        $language_ability = LanguageAbility::find($raport_2->language_ability_id);
        $language_ability->update([
            'point_1' => $request->point_42,
            'point_2' => $request->point_43,
            'point_3' => $request->point_44,
            'point_4' => $request->point_45,
            'point_5' => $request->point_46,
            'point_6' => $request->point_47,
            'point_7' => $request->point_48,
            'point_8' => $request->point_49,
            'point_9' => $request->point_50,
            'point_10' => $request->point_51,
            'point_11' => $request->point_52,
            'point_12' => $request->point_53,
            'point_13' => $request->point_54,
            'point_14' => $request->point_55,
            'point_15' => $request->point_56,
            'point_16' => $request->point_57,
            'point_17' => $request->point_58,
            'point_18' => $request->point_59,
            'point_19' => $request->point_60,
            'point_20' => $request->point_61,
        ]);

        $cognitive = Cognitive::find($raport_2->cognitive_id);
        $cognitive->update([
            'point_1'  => $request->point_62,
            'point_2'  => $request->point_63,
            'point_3'  => $request->point_64,
            'point_4'  => $request->point_65,
            'point_5'  => $request->point_66,
            'point_6'  => $request->point_67,
            'point_7'  => $request->point_68,
            'point_8'  => $request->point_69,
            'point_9'  => $request->point_70,
            'point_10'  => $request->point_71,
            'point_11'  => $request->point_72,
            'point_12'  => $request->point_73,
            'point_13'  => $request->point_74,
            'point_14'  => $request->point_75,
            'point_15'  => $request->point_76,
            'point_16'  => $request->point_77,
            'point_17'  => $request->point_78,
            'point_18'  => $request->point_79,
            'point_19'  => $request->point_80,
            'point_20'  => $request->point_81,
            'point_21'  => $request->point_82,
            'point_22'  => $request->point_83,
            'point_23'  => $request->point_84,
            'point_24'  => $request->point_85,
        ]);

        $physical_motoric = PhysicalMotoric::find($raport_2->physical_motoric_id);
        $physical_motoric->update([
            'point_1' => $request->point_86,
            'point_2' => $request->point_87,
            'point_3' => $request->point_88,
            'point_4' => $request->point_89,
            'point_5' => $request->point_90,
            'point_6' => $request->point_91,
            'point_7' => $request->point_92,
            'point_8' => $request->point_93,
            'point_9' => $request->point_94,
            'point_10' => $request->point_95,
            'point_11' => $request->point_96,
            'point_12' => $request->point_97,
            'point_13' => $request->point_98,
            'point_14' => $request->point_99,
            'point_15' => $request->point_100,
            'point_16' => $request->point_101,
            'point_17' => $request->point_102,
            'point_18' => $request->point_103,
            'point_19' => $request->point_104,
            'point_20' => $request->point_105,
            'point_21' => $request->point_106,
            'point_22' => $request->point_107,
            'point_23' => $request->point_108,
            'point_24' => $request->point_109,
            'point_25' => $request->point_110,
            'point_26' => $request->point_111,
        ]);

        $art = Art::find($raport_2->art_id);
        $art->update([
            'point_1' => $request->point_112,
            'point_2' => $request->point_113,
            'point_3' => $request->point_114,
            'point_4' => $request->point_115,
            'point_5' => $request->point_116,
            'point_6' => $request->point_117,
            'point_7' => $request->point_118,
            'point_8' => $request->point_119,
            'point_9' => $request->point_120,
            'point_10' => $request->point_121,
            'point_11' => $request->point_122,
            'point_12' => $request->point_123,
            'point_13' => $request->point_124,
            'point_14' => $request->point_125,
            'point_15' => $request->point_126,
            'point_16' => $request->point_127,
            'point_17' => $request->point_128,
            'point_18' => $request->point_129,
            'point_19' => $request->point_130,
            'point_20' => $request->point_131,
            'point_21' => $request->point_132,
            'point_22' => $request->point_133,
            'point_23' => $request->point_134,
            'point_24' => $request->point_135,
            'point_25' => $request->point_136,
            'point_26' => $request->point_137,
            'point_27' => $request->point_138,
            'point_28' => $request->point_139,
        ]);



        // update raport
        $raport_2->behavior_formation_id = $behavior_formation->id;
        $raport_2->language_ability_id = $language_ability->id;
        $raport_2->cognitive_id = $cognitive->id;
        $raport_2->physical_motoric_id = $physical_motoric->id;
        $raport_2->art_id = $art->id;
        $raport_2->semester_id = $request->semester;
        $raport_2->tahun_ajaran = $request->tahun_ajaran;
        $raport_2->tanggal_mulai = $request->tanggal_mulai;
        $raport_2->tanggal_selesai = $request->tanggal_selesai;
        $raport_2->save();

        return redirect()->route('raport.show', $student->username)->with('success', 'Data berhasil diubah');
    }
    // END : Semester 2


    // START : Semester 3
    public function editSemester3(Student $student)
    {
        return view('administrator.raport.edit-semester-3', [
            'title' => 'Edit Raport Peserta Didik',
            'student' => Student::find($student->id),
            'predicates' => Predicate::all(),
            'raport_3' => Raport::where('student_id', $student->id)->where('semester_id', 3)->first(),
            // get 2 years back from 2 years now
            'years' => range(date('Y') - 2, date('Y')),
        ]);
    }

    public function updateSemester3(Request $request, Student $student)
    {

        $request->validate([
            'semester' => 'required',
            'tahun_ajaran' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ]);

        $raport_3 = Raport::where('student_id', $student->id)->where('semester_id', 3)->first();
        $raport_3_Id = $raport_3->id;
        // get raport id
        $raport_3 = Raport::find($raport_3_Id);

        $behavior_formation = BehaviorFormation::find($raport_3->behavior_formation_id);
        $behavior_formation->update([
            'point_1' => $request->point_1,
            'point_2' => $request->point_2,
            'point_3' => $request->point_3,
            'point_4' => $request->point_4,
            'point_5' => $request->point_5,
            'point_6' => $request->point_6,
            'point_7' => $request->point_7,
            'point_8' => $request->point_8,
            'point_9' => $request->point_9,
            'point_10' => $request->point_10,
            'point_11' => $request->point_11,
            'point_12' => $request->point_12,
            'point_13' => $request->point_13,
            'point_14' => $request->point_14,
            'point_15' => $request->point_15,
            'point_16' => $request->point_16,
            'point_17' => $request->point_17,
            'point_18' => $request->point_18,
            'point_19' => $request->point_19,
            'point_20' => $request->point_20,
            'point_21' => $request->point_21,
            'point_22' => $request->point_22,
            'point_23' => $request->point_23,
            'point_24' => $request->point_24,
            'point_25' => $request->point_25,
            'point_26' => $request->point_26,
            'point_27' => $request->point_27,
            'point_28' => $request->point_28,
            'point_29' => $request->point_29,
            'point_30' => $request->point_30,
            'point_31' => $request->point_31,
            'point_32' => $request->point_32,
            'point_33' => $request->point_33,
            'point_34' => $request->point_34,
            'point_35' => $request->point_35,
            'point_36' => $request->point_36,
            'point_37' => $request->point_37,
            'point_38' => $request->point_38,
            'point_39' => $request->point_39,
            'point_40' => $request->point_40,
            'point_41' => $request->point_41,
        ]);

        $language_ability = LanguageAbility::find($raport_3->language_ability_id);
        $language_ability->update([
            'point_1' => $request->point_42,
            'point_2' => $request->point_43,
            'point_3' => $request->point_44,
            'point_4' => $request->point_45,
            'point_5' => $request->point_46,
            'point_6' => $request->point_47,
            'point_7' => $request->point_48,
            'point_8' => $request->point_49,
            'point_9' => $request->point_50,
            'point_10' => $request->point_51,
            'point_11' => $request->point_52,
            'point_12' => $request->point_53,
            'point_13' => $request->point_54,
            'point_14' => $request->point_55,
            'point_15' => $request->point_56,
            'point_16' => $request->point_57,
            'point_17' => $request->point_58,
            'point_18' => $request->point_59,
            'point_19' => $request->point_60,
            'point_20' => $request->point_61,
        ]);

        $cognitive = Cognitive::find($raport_3->cognitive_id);
        $cognitive->update([
            'point_1'  => $request->point_62,
            'point_2'  => $request->point_63,
            'point_3'  => $request->point_64,
            'point_4'  => $request->point_65,
            'point_5'  => $request->point_66,
            'point_6'  => $request->point_67,
            'point_7'  => $request->point_68,
            'point_8'  => $request->point_69,
            'point_9'  => $request->point_70,
            'point_10'  => $request->point_71,
            'point_11'  => $request->point_72,
            'point_12'  => $request->point_73,
            'point_13'  => $request->point_74,
            'point_14'  => $request->point_75,
            'point_15'  => $request->point_76,
            'point_16'  => $request->point_77,
            'point_17'  => $request->point_78,
            'point_18'  => $request->point_79,
            'point_19'  => $request->point_80,
            'point_20'  => $request->point_81,
            'point_21'  => $request->point_82,
            'point_22'  => $request->point_83,
            'point_23'  => $request->point_84,
            'point_24'  => $request->point_85,
        ]);

        $physical_motoric = PhysicalMotoric::find($raport_3->physical_motoric_id);
        $physical_motoric->update([
            'point_1' => $request->point_86,
            'point_2' => $request->point_87,
            'point_3' => $request->point_88,
            'point_4' => $request->point_89,
            'point_5' => $request->point_90,
            'point_6' => $request->point_91,
            'point_7' => $request->point_92,
            'point_8' => $request->point_93,
            'point_9' => $request->point_94,
            'point_10' => $request->point_95,
            'point_11' => $request->point_96,
            'point_12' => $request->point_97,
            'point_13' => $request->point_98,
            'point_14' => $request->point_99,
            'point_15' => $request->point_100,
            'point_16' => $request->point_101,
            'point_17' => $request->point_102,
            'point_18' => $request->point_103,
            'point_19' => $request->point_104,
            'point_20' => $request->point_105,
            'point_21' => $request->point_106,
            'point_22' => $request->point_107,
            'point_23' => $request->point_108,
            'point_24' => $request->point_109,
            'point_25' => $request->point_110,
            'point_26' => $request->point_111,
        ]);

        $art = Art::find($raport_3->art_id);
        $art->update([
            'point_1' => $request->point_112,
            'point_2' => $request->point_113,
            'point_3' => $request->point_114,
            'point_4' => $request->point_115,
            'point_5' => $request->point_116,
            'point_6' => $request->point_117,
            'point_7' => $request->point_118,
            'point_8' => $request->point_119,
            'point_9' => $request->point_120,
            'point_10' => $request->point_121,
            'point_11' => $request->point_122,
            'point_12' => $request->point_123,
            'point_13' => $request->point_124,
            'point_14' => $request->point_125,
            'point_15' => $request->point_126,
            'point_16' => $request->point_127,
            'point_17' => $request->point_128,
            'point_18' => $request->point_129,
            'point_19' => $request->point_130,
            'point_20' => $request->point_131,
            'point_21' => $request->point_132,
            'point_22' => $request->point_133,
            'point_23' => $request->point_134,
            'point_24' => $request->point_135,
            'point_25' => $request->point_136,
            'point_26' => $request->point_137,
            'point_27' => $request->point_138,
            'point_28' => $request->point_139,
        ]);



        // update raport
        $raport_3->behavior_formation_id = $behavior_formation->id;
        $raport_3->language_ability_id = $language_ability->id;
        $raport_3->cognitive_id = $cognitive->id;
        $raport_3->physical_motoric_id = $physical_motoric->id;
        $raport_3->art_id = $art->id;
        $raport_3->semester_id = $request->semester;
        $raport_3->tahun_ajaran = $request->tahun_ajaran;
        $raport_3->tanggal_mulai = $request->tanggal_mulai;
        $raport_3->tanggal_selesai = $request->tanggal_selesai;
        $raport_3->save();

        return redirect()->route('raport.show', $student->username)->with('success', 'Data berhasil diubah');
    }
    // END : Semester 3


    // START : Semester 4
    public function editSemester4(Student $student)
    {
        return view('administrator.raport.edit-semester-4', [
            'title' => 'Edit Raport Peserta Didik',
            'student' => Student::find($student->id),
            'predicates' => Predicate::all(),
            'raport_4' => Raport::where('student_id', $student->id)->where('semester_id', 4)->first(),
            // get 2 years back from 2 years now
            'years' => range(date('Y') - 2, date('Y')),
        ]);
    }

    public function updateSemester4(Request $request, Student $student)
    {

        $request->validate([
            'semester' => 'required',
            'tahun_ajaran' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ]);

        $raport_4 = Raport::where('student_id', $student->id)->where('semester_id', 4)->first();
        $raport_4_Id = $raport_4->id;
        // get raport id
        $raport_4 = Raport::find($raport_4_Id);

        $behavior_formation = BehaviorFormation::find($raport_4->behavior_formation_id);
        $behavior_formation->update([
            'point_1' => $request->point_1,
            'point_2' => $request->point_2,
            'point_3' => $request->point_3,
            'point_4' => $request->point_4,
            'point_5' => $request->point_5,
            'point_6' => $request->point_6,
            'point_7' => $request->point_7,
            'point_8' => $request->point_8,
            'point_9' => $request->point_9,
            'point_10' => $request->point_10,
            'point_11' => $request->point_11,
            'point_12' => $request->point_12,
            'point_13' => $request->point_13,
            'point_14' => $request->point_14,
            'point_15' => $request->point_15,
            'point_16' => $request->point_16,
            'point_17' => $request->point_17,
            'point_18' => $request->point_18,
            'point_19' => $request->point_19,
            'point_20' => $request->point_20,
            'point_21' => $request->point_21,
            'point_22' => $request->point_22,
            'point_23' => $request->point_23,
            'point_24' => $request->point_24,
            'point_25' => $request->point_25,
            'point_26' => $request->point_26,
            'point_27' => $request->point_27,
            'point_28' => $request->point_28,
            'point_29' => $request->point_29,
            'point_30' => $request->point_30,
            'point_31' => $request->point_31,
            'point_32' => $request->point_32,
            'point_33' => $request->point_33,
            'point_34' => $request->point_34,
            'point_35' => $request->point_35,
            'point_36' => $request->point_36,
            'point_37' => $request->point_37,
            'point_38' => $request->point_38,
            'point_39' => $request->point_39,
            'point_40' => $request->point_40,
            'point_41' => $request->point_41,
        ]);

        $language_ability = LanguageAbility::find($raport_4->language_ability_id);
        $language_ability->update([
            'point_1' => $request->point_42,
            'point_2' => $request->point_43,
            'point_3' => $request->point_44,
            'point_4' => $request->point_45,
            'point_5' => $request->point_46,
            'point_6' => $request->point_47,
            'point_7' => $request->point_48,
            'point_8' => $request->point_49,
            'point_9' => $request->point_50,
            'point_10' => $request->point_51,
            'point_11' => $request->point_52,
            'point_12' => $request->point_53,
            'point_13' => $request->point_54,
            'point_14' => $request->point_55,
            'point_15' => $request->point_56,
            'point_16' => $request->point_57,
            'point_17' => $request->point_58,
            'point_18' => $request->point_59,
            'point_19' => $request->point_60,
            'point_20' => $request->point_61,
        ]);

        $cognitive = Cognitive::find($raport_4->cognitive_id);
        $cognitive->update([
            'point_1'  => $request->point_62,
            'point_2'  => $request->point_63,
            'point_3'  => $request->point_64,
            'point_4'  => $request->point_65,
            'point_5'  => $request->point_66,
            'point_6'  => $request->point_67,
            'point_7'  => $request->point_68,
            'point_8'  => $request->point_69,
            'point_9'  => $request->point_70,
            'point_10'  => $request->point_71,
            'point_11'  => $request->point_72,
            'point_12'  => $request->point_73,
            'point_13'  => $request->point_74,
            'point_14'  => $request->point_75,
            'point_15'  => $request->point_76,
            'point_16'  => $request->point_77,
            'point_17'  => $request->point_78,
            'point_18'  => $request->point_79,
            'point_19'  => $request->point_80,
            'point_20'  => $request->point_81,
            'point_21'  => $request->point_82,
            'point_22'  => $request->point_83,
            'point_23'  => $request->point_84,
            'point_24'  => $request->point_85,
        ]);

        $physical_motoric = PhysicalMotoric::find($raport_4->physical_motoric_id);
        $physical_motoric->update([
            'point_1' => $request->point_86,
            'point_2' => $request->point_87,
            'point_3' => $request->point_88,
            'point_4' => $request->point_89,
            'point_5' => $request->point_90,
            'point_6' => $request->point_91,
            'point_7' => $request->point_92,
            'point_8' => $request->point_93,
            'point_9' => $request->point_94,
            'point_10' => $request->point_95,
            'point_11' => $request->point_96,
            'point_12' => $request->point_97,
            'point_13' => $request->point_98,
            'point_14' => $request->point_99,
            'point_15' => $request->point_100,
            'point_16' => $request->point_101,
            'point_17' => $request->point_102,
            'point_18' => $request->point_103,
            'point_19' => $request->point_104,
            'point_20' => $request->point_105,
            'point_21' => $request->point_106,
            'point_22' => $request->point_107,
            'point_23' => $request->point_108,
            'point_24' => $request->point_109,
            'point_25' => $request->point_110,
            'point_26' => $request->point_111,
        ]);

        $art = Art::find($raport_4->art_id);
        $art->update([
            'point_1' => $request->point_112,
            'point_2' => $request->point_113,
            'point_3' => $request->point_114,
            'point_4' => $request->point_115,
            'point_5' => $request->point_116,
            'point_6' => $request->point_117,
            'point_7' => $request->point_118,
            'point_8' => $request->point_119,
            'point_9' => $request->point_120,
            'point_10' => $request->point_121,
            'point_11' => $request->point_122,
            'point_12' => $request->point_123,
            'point_13' => $request->point_124,
            'point_14' => $request->point_125,
            'point_15' => $request->point_126,
            'point_16' => $request->point_127,
            'point_17' => $request->point_128,
            'point_18' => $request->point_129,
            'point_19' => $request->point_130,
            'point_20' => $request->point_131,
            'point_21' => $request->point_132,
            'point_22' => $request->point_133,
            'point_23' => $request->point_134,
            'point_24' => $request->point_135,
            'point_25' => $request->point_136,
            'point_26' => $request->point_137,
            'point_27' => $request->point_138,
            'point_28' => $request->point_139,
        ]);



        // update raport
        $raport_4->behavior_formation_id = $behavior_formation->id;
        $raport_4->language_ability_id = $language_ability->id;
        $raport_4->cognitive_id = $cognitive->id;
        $raport_4->physical_motoric_id = $physical_motoric->id;
        $raport_4->art_id = $art->id;
        $raport_4->semester_id = $request->semester;
        $raport_4->tahun_ajaran = $request->tahun_ajaran;
        $raport_4->tanggal_mulai = $request->tanggal_mulai;
        $raport_4->tanggal_selesai = $request->tanggal_selesai;
        $raport_4->save();

        return redirect()->route('raport.show', $student->username)->with('success', 'Data berhasil diubah');
    }
    // END : Semester 4


    // START : Semester 5
    public function editSemester5(Student $student)
    {
        return view('administrator.raport.edit-semester-5', [
            'title' => 'Edit Raport Peserta Didik',
            'student' => Student::find($student->id),
            'predicates' => Predicate::all(),
            'raport_5' => Raport::where('student_id', $student->id)->where('semester_id', 5)->first(),
            // get 2 years back from 2 years now
            'years' => range(date('Y') - 2, date('Y')),
        ]);
    }

    public function updateSemester5(Request $request, Student $student)
    {

        $request->validate([
            'semester' => 'required',
            'tahun_ajaran' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ]);

        $raport_5 = Raport::where('student_id', $student->id)->where('semester_id', 5)->first();
        $raport_5_Id = $raport_5->id;
        // get raport id
        $raport_5 = Raport::find($raport_5_Id);

        $behavior_formation = BehaviorFormation::find($raport_5->behavior_formation_id);
        $behavior_formation->update([
            'point_1' => $request->point_1,
            'point_2' => $request->point_2,
            'point_3' => $request->point_3,
            'point_4' => $request->point_4,
            'point_5' => $request->point_5,
            'point_6' => $request->point_6,
            'point_7' => $request->point_7,
            'point_8' => $request->point_8,
            'point_9' => $request->point_9,
            'point_10' => $request->point_10,
            'point_11' => $request->point_11,
            'point_12' => $request->point_12,
            'point_13' => $request->point_13,
            'point_14' => $request->point_14,
            'point_15' => $request->point_15,
            'point_16' => $request->point_16,
            'point_17' => $request->point_17,
            'point_18' => $request->point_18,
            'point_19' => $request->point_19,
            'point_20' => $request->point_20,
            'point_21' => $request->point_21,
            'point_22' => $request->point_22,
            'point_23' => $request->point_23,
            'point_24' => $request->point_24,
            'point_25' => $request->point_25,
            'point_26' => $request->point_26,
            'point_27' => $request->point_27,
            'point_28' => $request->point_28,
            'point_29' => $request->point_29,
            'point_30' => $request->point_30,
            'point_31' => $request->point_31,
            'point_32' => $request->point_32,
            'point_33' => $request->point_33,
            'point_34' => $request->point_34,
            'point_35' => $request->point_35,
            'point_36' => $request->point_36,
            'point_37' => $request->point_37,
            'point_38' => $request->point_38,
            'point_39' => $request->point_39,
            'point_40' => $request->point_40,
            'point_41' => $request->point_41,
        ]);

        $language_ability = LanguageAbility::find($raport_5->language_ability_id);
        $language_ability->update([
            'point_1' => $request->point_42,
            'point_2' => $request->point_43,
            'point_3' => $request->point_44,
            'point_4' => $request->point_45,
            'point_5' => $request->point_46,
            'point_6' => $request->point_47,
            'point_7' => $request->point_48,
            'point_8' => $request->point_49,
            'point_9' => $request->point_50,
            'point_10' => $request->point_51,
            'point_11' => $request->point_52,
            'point_12' => $request->point_53,
            'point_13' => $request->point_54,
            'point_14' => $request->point_55,
            'point_15' => $request->point_56,
            'point_16' => $request->point_57,
            'point_17' => $request->point_58,
            'point_18' => $request->point_59,
            'point_19' => $request->point_60,
            'point_20' => $request->point_61,
        ]);

        $cognitive = Cognitive::find($raport_5->cognitive_id);
        $cognitive->update([
            'point_1'  => $request->point_62,
            'point_2'  => $request->point_63,
            'point_3'  => $request->point_64,
            'point_4'  => $request->point_65,
            'point_5'  => $request->point_66,
            'point_6'  => $request->point_67,
            'point_7'  => $request->point_68,
            'point_8'  => $request->point_69,
            'point_9'  => $request->point_70,
            'point_10'  => $request->point_71,
            'point_11'  => $request->point_72,
            'point_12'  => $request->point_73,
            'point_13'  => $request->point_74,
            'point_14'  => $request->point_75,
            'point_15'  => $request->point_76,
            'point_16'  => $request->point_77,
            'point_17'  => $request->point_78,
            'point_18'  => $request->point_79,
            'point_19'  => $request->point_80,
            'point_20'  => $request->point_81,
            'point_21'  => $request->point_82,
            'point_22'  => $request->point_83,
            'point_23'  => $request->point_84,
            'point_24'  => $request->point_85,
        ]);

        $physical_motoric = PhysicalMotoric::find($raport_5->physical_motoric_id);
        $physical_motoric->update([
            'point_1' => $request->point_86,
            'point_2' => $request->point_87,
            'point_3' => $request->point_88,
            'point_4' => $request->point_89,
            'point_5' => $request->point_90,
            'point_6' => $request->point_91,
            'point_7' => $request->point_92,
            'point_8' => $request->point_93,
            'point_9' => $request->point_94,
            'point_10' => $request->point_95,
            'point_11' => $request->point_96,
            'point_12' => $request->point_97,
            'point_13' => $request->point_98,
            'point_14' => $request->point_99,
            'point_15' => $request->point_100,
            'point_16' => $request->point_101,
            'point_17' => $request->point_102,
            'point_18' => $request->point_103,
            'point_19' => $request->point_104,
            'point_20' => $request->point_105,
            'point_21' => $request->point_106,
            'point_22' => $request->point_107,
            'point_23' => $request->point_108,
            'point_24' => $request->point_109,
            'point_25' => $request->point_110,
            'point_26' => $request->point_111,
        ]);

        $art = Art::find($raport_5->art_id);
        $art->update([
            'point_1' => $request->point_112,
            'point_2' => $request->point_113,
            'point_3' => $request->point_114,
            'point_4' => $request->point_115,
            'point_5' => $request->point_116,
            'point_6' => $request->point_117,
            'point_7' => $request->point_118,
            'point_8' => $request->point_119,
            'point_9' => $request->point_120,
            'point_10' => $request->point_121,
            'point_11' => $request->point_122,
            'point_12' => $request->point_123,
            'point_13' => $request->point_124,
            'point_14' => $request->point_125,
            'point_15' => $request->point_126,
            'point_16' => $request->point_127,
            'point_17' => $request->point_128,
            'point_18' => $request->point_129,
            'point_19' => $request->point_130,
            'point_20' => $request->point_131,
            'point_21' => $request->point_132,
            'point_22' => $request->point_133,
            'point_23' => $request->point_134,
            'point_24' => $request->point_135,
            'point_25' => $request->point_136,
            'point_26' => $request->point_137,
            'point_27' => $request->point_138,
            'point_28' => $request->point_139,
        ]);



        // update raport
        $raport_5->behavior_formation_id = $behavior_formation->id;
        $raport_5->language_ability_id = $language_ability->id;
        $raport_5->cognitive_id = $cognitive->id;
        $raport_5->physical_motoric_id = $physical_motoric->id;
        $raport_5->art_id = $art->id;
        $raport_5->semester_id = $request->semester;
        $raport_5->tahun_ajaran = $request->tahun_ajaran;
        $raport_5->tanggal_mulai = $request->tanggal_mulai;
        $raport_5->tanggal_selesai = $request->tanggal_selesai;
        $raport_5->save();

        return redirect()->route('raport.show', $student->username)->with('success', 'Data berhasil diubah');
    }
    // END : Semester 5


    // START : Semester 6
    public function editSemester6(Student $student)
    {
        return view('administrator.raport.edit-semester-6', [
            'title' => 'Edit Raport Peserta Didik',
            'student' => Student::find($student->id),
            'predicates' => Predicate::all(),
            'raport_6' => Raport::where('student_id', $student->id)->where('semester_id', 6)->first(),
            // get 2 years back from 2 years now
            'years' => range(date('Y') - 2, date('Y')),
        ]);
    }

    public function updateSemester6(Request $request, Student $student)
    {

        $request->validate([
            'semester' => 'required',
            'tahun_ajaran' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ]);

        $raport_6 = Raport::where('student_id', $student->id)->where('semester_id', 6)->first();
        $raport_6_Id = $raport_6->id;
        // get raport id
        $raport_6 = Raport::find($raport_6_Id);

        $behavior_formation = BehaviorFormation::find($raport_6->behavior_formation_id);
        $behavior_formation->update([
            'point_1' => $request->point_1,
            'point_2' => $request->point_2,
            'point_3' => $request->point_3,
            'point_4' => $request->point_4,
            'point_5' => $request->point_5,
            'point_6' => $request->point_6,
            'point_7' => $request->point_7,
            'point_8' => $request->point_8,
            'point_9' => $request->point_9,
            'point_10' => $request->point_10,
            'point_11' => $request->point_11,
            'point_12' => $request->point_12,
            'point_13' => $request->point_13,
            'point_14' => $request->point_14,
            'point_15' => $request->point_15,
            'point_16' => $request->point_16,
            'point_17' => $request->point_17,
            'point_18' => $request->point_18,
            'point_19' => $request->point_19,
            'point_20' => $request->point_20,
            'point_21' => $request->point_21,
            'point_22' => $request->point_22,
            'point_23' => $request->point_23,
            'point_24' => $request->point_24,
            'point_25' => $request->point_25,
            'point_26' => $request->point_26,
            'point_27' => $request->point_27,
            'point_28' => $request->point_28,
            'point_29' => $request->point_29,
            'point_30' => $request->point_30,
            'point_31' => $request->point_31,
            'point_32' => $request->point_32,
            'point_33' => $request->point_33,
            'point_34' => $request->point_34,
            'point_35' => $request->point_35,
            'point_36' => $request->point_36,
            'point_37' => $request->point_37,
            'point_38' => $request->point_38,
            'point_39' => $request->point_39,
            'point_40' => $request->point_40,
            'point_41' => $request->point_41,
        ]);

        $language_ability = LanguageAbility::find($raport_6->language_ability_id);
        $language_ability->update([
            'point_1' => $request->point_42,
            'point_2' => $request->point_43,
            'point_3' => $request->point_44,
            'point_4' => $request->point_45,
            'point_5' => $request->point_46,
            'point_6' => $request->point_47,
            'point_7' => $request->point_48,
            'point_8' => $request->point_49,
            'point_9' => $request->point_50,
            'point_10' => $request->point_51,
            'point_11' => $request->point_52,
            'point_12' => $request->point_53,
            'point_13' => $request->point_54,
            'point_14' => $request->point_55,
            'point_15' => $request->point_56,
            'point_16' => $request->point_57,
            'point_17' => $request->point_58,
            'point_18' => $request->point_59,
            'point_19' => $request->point_60,
            'point_20' => $request->point_61,
        ]);

        $cognitive = Cognitive::find($raport_6->cognitive_id);
        $cognitive->update([
            'point_1'  => $request->point_62,
            'point_2'  => $request->point_63,
            'point_3'  => $request->point_64,
            'point_4'  => $request->point_65,
            'point_5'  => $request->point_66,
            'point_6'  => $request->point_67,
            'point_7'  => $request->point_68,
            'point_8'  => $request->point_69,
            'point_9'  => $request->point_70,
            'point_10'  => $request->point_71,
            'point_11'  => $request->point_72,
            'point_12'  => $request->point_73,
            'point_13'  => $request->point_74,
            'point_14'  => $request->point_75,
            'point_15'  => $request->point_76,
            'point_16'  => $request->point_77,
            'point_17'  => $request->point_78,
            'point_18'  => $request->point_79,
            'point_19'  => $request->point_80,
            'point_20'  => $request->point_81,
            'point_21'  => $request->point_82,
            'point_22'  => $request->point_83,
            'point_23'  => $request->point_84,
            'point_24'  => $request->point_85,
        ]);

        $physical_motoric = PhysicalMotoric::find($raport_6->physical_motoric_id);
        $physical_motoric->update([
            'point_1' => $request->point_86,
            'point_2' => $request->point_87,
            'point_3' => $request->point_88,
            'point_4' => $request->point_89,
            'point_5' => $request->point_90,
            'point_6' => $request->point_91,
            'point_7' => $request->point_92,
            'point_8' => $request->point_93,
            'point_9' => $request->point_94,
            'point_10' => $request->point_95,
            'point_11' => $request->point_96,
            'point_12' => $request->point_97,
            'point_13' => $request->point_98,
            'point_14' => $request->point_99,
            'point_15' => $request->point_100,
            'point_16' => $request->point_101,
            'point_17' => $request->point_102,
            'point_18' => $request->point_103,
            'point_19' => $request->point_104,
            'point_20' => $request->point_105,
            'point_21' => $request->point_106,
            'point_22' => $request->point_107,
            'point_23' => $request->point_108,
            'point_24' => $request->point_109,
            'point_25' => $request->point_110,
            'point_26' => $request->point_111,
        ]);

        $art = Art::find($raport_6->art_id);
        $art->update([
            'point_1' => $request->point_112,
            'point_2' => $request->point_113,
            'point_3' => $request->point_114,
            'point_4' => $request->point_115,
            'point_5' => $request->point_116,
            'point_6' => $request->point_117,
            'point_7' => $request->point_118,
            'point_8' => $request->point_119,
            'point_9' => $request->point_120,
            'point_10' => $request->point_121,
            'point_11' => $request->point_122,
            'point_12' => $request->point_123,
            'point_13' => $request->point_124,
            'point_14' => $request->point_125,
            'point_15' => $request->point_126,
            'point_16' => $request->point_127,
            'point_17' => $request->point_128,
            'point_18' => $request->point_129,
            'point_19' => $request->point_130,
            'point_20' => $request->point_131,
            'point_21' => $request->point_132,
            'point_22' => $request->point_133,
            'point_23' => $request->point_134,
            'point_24' => $request->point_135,
            'point_25' => $request->point_136,
            'point_26' => $request->point_137,
            'point_27' => $request->point_138,
            'point_28' => $request->point_139,
        ]);



        // update raport
        $raport_6->behavior_formation_id = $behavior_formation->id;
        $raport_6->language_ability_id = $language_ability->id;
        $raport_6->cognitive_id = $cognitive->id;
        $raport_6->physical_motoric_id = $physical_motoric->id;
        $raport_6->art_id = $art->id;
        $raport_6->semester_id = $request->semester;
        $raport_6->tahun_ajaran = $request->tahun_ajaran;
        $raport_6->tanggal_mulai = $request->tanggal_mulai;
        $raport_6->tanggal_selesai = $request->tanggal_selesai;
        $raport_6->save();

        return redirect()->route('raport.show', $student->username)->with('success', 'Data berhasil diubah');
    }
    // END : Semester 6


    // START : Semester 7
    public function editSemester7(Student $student)
    {
        return view('administrator.raport.edit-semester-7', [
            'title' => 'Edit Raport Peserta Didik',
            'student' => Student::find($student->id),
            'predicates' => Predicate::all(),
            'raport_7' => Raport::where('student_id', $student->id)->where('semester_id', 7)->first(),
            // get 2 years back from 2 years now
            'years' => range(date('Y') - 2, date('Y')),
        ]);
    }

    public function updateSemester7(Request $request, Student $student)
    {

        $request->validate([
            'semester' => 'required',
            'tahun_ajaran' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ]);

        $raport_7 = Raport::where('student_id', $student->id)->where('semester_id', 7)->first();
        $raport_7_Id = $raport_7->id;
        // get raport id
        $raport_7 = Raport::find($raport_7_Id);

        $behavior_formation = BehaviorFormation::find($raport_7->behavior_formation_id);
        $behavior_formation->update([
            'point_1' => $request->point_1,
            'point_2' => $request->point_2,
            'point_3' => $request->point_3,
            'point_4' => $request->point_4,
            'point_5' => $request->point_5,
            'point_6' => $request->point_6,
            'point_7' => $request->point_7,
            'point_8' => $request->point_8,
            'point_9' => $request->point_9,
            'point_10' => $request->point_10,
            'point_11' => $request->point_11,
            'point_12' => $request->point_12,
            'point_13' => $request->point_13,
            'point_14' => $request->point_14,
            'point_15' => $request->point_15,
            'point_16' => $request->point_16,
            'point_17' => $request->point_17,
            'point_18' => $request->point_18,
            'point_19' => $request->point_19,
            'point_20' => $request->point_20,
            'point_21' => $request->point_21,
            'point_22' => $request->point_22,
            'point_23' => $request->point_23,
            'point_24' => $request->point_24,
            'point_25' => $request->point_25,
            'point_26' => $request->point_26,
            'point_27' => $request->point_27,
            'point_28' => $request->point_28,
            'point_29' => $request->point_29,
            'point_30' => $request->point_30,
            'point_31' => $request->point_31,
            'point_32' => $request->point_32,
            'point_33' => $request->point_33,
            'point_34' => $request->point_34,
            'point_35' => $request->point_35,
            'point_36' => $request->point_36,
            'point_37' => $request->point_37,
            'point_38' => $request->point_38,
            'point_39' => $request->point_39,
            'point_40' => $request->point_40,
            'point_41' => $request->point_41,
        ]);

        $language_ability = LanguageAbility::find($raport_7->language_ability_id);
        $language_ability->update([
            'point_1' => $request->point_42,
            'point_2' => $request->point_43,
            'point_3' => $request->point_44,
            'point_4' => $request->point_45,
            'point_5' => $request->point_46,
            'point_6' => $request->point_47,
            'point_7' => $request->point_48,
            'point_8' => $request->point_49,
            'point_9' => $request->point_50,
            'point_10' => $request->point_51,
            'point_11' => $request->point_52,
            'point_12' => $request->point_53,
            'point_13' => $request->point_54,
            'point_14' => $request->point_55,
            'point_15' => $request->point_56,
            'point_16' => $request->point_57,
            'point_17' => $request->point_58,
            'point_18' => $request->point_59,
            'point_19' => $request->point_60,
            'point_20' => $request->point_61,
        ]);

        $cognitive = Cognitive::find($raport_7->cognitive_id);
        $cognitive->update([
            'point_1'  => $request->point_62,
            'point_2'  => $request->point_63,
            'point_3'  => $request->point_64,
            'point_4'  => $request->point_65,
            'point_5'  => $request->point_66,
            'point_6'  => $request->point_67,
            'point_7'  => $request->point_68,
            'point_8'  => $request->point_69,
            'point_9'  => $request->point_70,
            'point_10'  => $request->point_71,
            'point_11'  => $request->point_72,
            'point_12'  => $request->point_73,
            'point_13'  => $request->point_74,
            'point_14'  => $request->point_75,
            'point_15'  => $request->point_76,
            'point_16'  => $request->point_77,
            'point_17'  => $request->point_78,
            'point_18'  => $request->point_79,
            'point_19'  => $request->point_80,
            'point_20'  => $request->point_81,
            'point_21'  => $request->point_82,
            'point_22'  => $request->point_83,
            'point_23'  => $request->point_84,
            'point_24'  => $request->point_85,
        ]);

        $physical_motoric = PhysicalMotoric::find($raport_7->physical_motoric_id);
        $physical_motoric->update([
            'point_1' => $request->point_86,
            'point_2' => $request->point_87,
            'point_3' => $request->point_88,
            'point_4' => $request->point_89,
            'point_5' => $request->point_90,
            'point_6' => $request->point_91,
            'point_7' => $request->point_92,
            'point_8' => $request->point_93,
            'point_9' => $request->point_94,
            'point_10' => $request->point_95,
            'point_11' => $request->point_96,
            'point_12' => $request->point_97,
            'point_13' => $request->point_98,
            'point_14' => $request->point_99,
            'point_15' => $request->point_100,
            'point_16' => $request->point_101,
            'point_17' => $request->point_102,
            'point_18' => $request->point_103,
            'point_19' => $request->point_104,
            'point_20' => $request->point_105,
            'point_21' => $request->point_106,
            'point_22' => $request->point_107,
            'point_23' => $request->point_108,
            'point_24' => $request->point_109,
            'point_25' => $request->point_110,
            'point_26' => $request->point_111,
        ]);

        $art = Art::find($raport_7->art_id);
        $art->update([
            'point_1' => $request->point_112,
            'point_2' => $request->point_113,
            'point_3' => $request->point_114,
            'point_4' => $request->point_115,
            'point_5' => $request->point_116,
            'point_6' => $request->point_117,
            'point_7' => $request->point_118,
            'point_8' => $request->point_119,
            'point_9' => $request->point_120,
            'point_10' => $request->point_121,
            'point_11' => $request->point_122,
            'point_12' => $request->point_123,
            'point_13' => $request->point_124,
            'point_14' => $request->point_125,
            'point_15' => $request->point_126,
            'point_16' => $request->point_127,
            'point_17' => $request->point_128,
            'point_18' => $request->point_129,
            'point_19' => $request->point_130,
            'point_20' => $request->point_131,
            'point_21' => $request->point_132,
            'point_22' => $request->point_133,
            'point_23' => $request->point_134,
            'point_24' => $request->point_135,
            'point_25' => $request->point_136,
            'point_26' => $request->point_137,
            'point_27' => $request->point_138,
            'point_28' => $request->point_139,
        ]);



        // update raport
        $raport_7->behavior_formation_id = $behavior_formation->id;
        $raport_7->language_ability_id = $language_ability->id;
        $raport_7->cognitive_id = $cognitive->id;
        $raport_7->physical_motoric_id = $physical_motoric->id;
        $raport_7->art_id = $art->id;
        $raport_7->semester_id = $request->semester;
        $raport_7->tahun_ajaran = $request->tahun_ajaran;
        $raport_7->tanggal_mulai = $request->tanggal_mulai;
        $raport_7->tanggal_selesai = $request->tanggal_selesai;
        $raport_7->save();

        return redirect()->route('raport.show', $student->username)->with('success', 'Data berhasil diubah');
    }
    // END : Semester 7


    // START : Semester 8
    public function editSemester8(Student $student)
    {
        return view('administrator.raport.edit-semester-8', [
            'title' => 'Edit Raport Peserta Didik',
            'student' => Student::find($student->id),
            'predicates' => Predicate::all(),
            'raport_8' => Raport::where('student_id', $student->id)->where('semester_id', 8)->first(),
            // get 2 years back from 2 years now
            'years' => range(date('Y') - 2, date('Y')),
        ]);
    }

    public function updateSemester8(Request $request, Student $student)
    {

        $request->validate([
            'semester' => 'required',
            'tahun_ajaran' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ]);

        $raport_8 = Raport::where('student_id', $student->id)->where('semester_id', 8)->first();
        $raport_8_Id = $raport_8->id;
        // get raport id
        $raport_8 = Raport::find($raport_8_Id);

        $behavior_formation = BehaviorFormation::find($raport_8->behavior_formation_id);
        $behavior_formation->update([
            'point_1' => $request->point_1,
            'point_2' => $request->point_2,
            'point_3' => $request->point_3,
            'point_4' => $request->point_4,
            'point_5' => $request->point_5,
            'point_6' => $request->point_6,
            'point_7' => $request->point_7,
            'point_8' => $request->point_8,
            'point_9' => $request->point_9,
            'point_10' => $request->point_10,
            'point_11' => $request->point_11,
            'point_12' => $request->point_12,
            'point_13' => $request->point_13,
            'point_14' => $request->point_14,
            'point_15' => $request->point_15,
            'point_16' => $request->point_16,
            'point_17' => $request->point_17,
            'point_18' => $request->point_18,
            'point_19' => $request->point_19,
            'point_20' => $request->point_20,
            'point_21' => $request->point_21,
            'point_22' => $request->point_22,
            'point_23' => $request->point_23,
            'point_24' => $request->point_24,
            'point_25' => $request->point_25,
            'point_26' => $request->point_26,
            'point_27' => $request->point_27,
            'point_28' => $request->point_28,
            'point_29' => $request->point_29,
            'point_30' => $request->point_30,
            'point_31' => $request->point_31,
            'point_32' => $request->point_32,
            'point_33' => $request->point_33,
            'point_34' => $request->point_34,
            'point_35' => $request->point_35,
            'point_36' => $request->point_36,
            'point_37' => $request->point_37,
            'point_38' => $request->point_38,
            'point_39' => $request->point_39,
            'point_40' => $request->point_40,
            'point_41' => $request->point_41,
        ]);

        $language_ability = LanguageAbility::find($raport_8->language_ability_id);
        $language_ability->update([
            'point_1' => $request->point_42,
            'point_2' => $request->point_43,
            'point_3' => $request->point_44,
            'point_4' => $request->point_45,
            'point_5' => $request->point_46,
            'point_6' => $request->point_47,
            'point_7' => $request->point_48,
            'point_8' => $request->point_49,
            'point_9' => $request->point_50,
            'point_10' => $request->point_51,
            'point_11' => $request->point_52,
            'point_12' => $request->point_53,
            'point_13' => $request->point_54,
            'point_14' => $request->point_55,
            'point_15' => $request->point_56,
            'point_16' => $request->point_57,
            'point_17' => $request->point_58,
            'point_18' => $request->point_59,
            'point_19' => $request->point_60,
            'point_20' => $request->point_61,
        ]);

        $cognitive = Cognitive::find($raport_8->cognitive_id);
        $cognitive->update([
            'point_1'  => $request->point_62,
            'point_2'  => $request->point_63,
            'point_3'  => $request->point_64,
            'point_4'  => $request->point_65,
            'point_5'  => $request->point_66,
            'point_6'  => $request->point_67,
            'point_7'  => $request->point_68,
            'point_8'  => $request->point_69,
            'point_9'  => $request->point_70,
            'point_10'  => $request->point_71,
            'point_11'  => $request->point_72,
            'point_12'  => $request->point_73,
            'point_13'  => $request->point_74,
            'point_14'  => $request->point_75,
            'point_15'  => $request->point_76,
            'point_16'  => $request->point_77,
            'point_17'  => $request->point_78,
            'point_18'  => $request->point_79,
            'point_19'  => $request->point_80,
            'point_20'  => $request->point_81,
            'point_21'  => $request->point_82,
            'point_22'  => $request->point_83,
            'point_23'  => $request->point_84,
            'point_24'  => $request->point_85,
        ]);

        $physical_motoric = PhysicalMotoric::find($raport_8->physical_motoric_id);
        $physical_motoric->update([
            'point_1' => $request->point_86,
            'point_2' => $request->point_87,
            'point_3' => $request->point_88,
            'point_4' => $request->point_89,
            'point_5' => $request->point_90,
            'point_6' => $request->point_91,
            'point_7' => $request->point_92,
            'point_8' => $request->point_93,
            'point_9' => $request->point_94,
            'point_10' => $request->point_95,
            'point_11' => $request->point_96,
            'point_12' => $request->point_97,
            'point_13' => $request->point_98,
            'point_14' => $request->point_99,
            'point_15' => $request->point_100,
            'point_16' => $request->point_101,
            'point_17' => $request->point_102,
            'point_18' => $request->point_103,
            'point_19' => $request->point_104,
            'point_20' => $request->point_105,
            'point_21' => $request->point_106,
            'point_22' => $request->point_107,
            'point_23' => $request->point_108,
            'point_24' => $request->point_109,
            'point_25' => $request->point_110,
            'point_26' => $request->point_111,
        ]);

        $art = Art::find($raport_8->art_id);
        $art->update([
            'point_1' => $request->point_112,
            'point_2' => $request->point_113,
            'point_3' => $request->point_114,
            'point_4' => $request->point_115,
            'point_5' => $request->point_116,
            'point_6' => $request->point_117,
            'point_7' => $request->point_118,
            'point_8' => $request->point_119,
            'point_9' => $request->point_120,
            'point_10' => $request->point_121,
            'point_11' => $request->point_122,
            'point_12' => $request->point_123,
            'point_13' => $request->point_124,
            'point_14' => $request->point_125,
            'point_15' => $request->point_126,
            'point_16' => $request->point_127,
            'point_17' => $request->point_128,
            'point_18' => $request->point_129,
            'point_19' => $request->point_130,
            'point_20' => $request->point_131,
            'point_21' => $request->point_132,
            'point_22' => $request->point_133,
            'point_23' => $request->point_134,
            'point_24' => $request->point_135,
            'point_25' => $request->point_136,
            'point_26' => $request->point_137,
            'point_27' => $request->point_138,
            'point_28' => $request->point_139,
        ]);



        // update raport
        $raport_8->behavior_formation_id = $behavior_formation->id;
        $raport_8->language_ability_id = $language_ability->id;
        $raport_8->cognitive_id = $cognitive->id;
        $raport_8->physical_motoric_id = $physical_motoric->id;
        $raport_8->art_id = $art->id;
        $raport_8->semester_id = $request->semester;
        $raport_8->tahun_ajaran = $request->tahun_ajaran;
        $raport_8->tanggal_mulai = $request->tanggal_mulai;
        $raport_8->tanggal_selesai = $request->tanggal_selesai;
        $raport_8->save();

        return redirect()->route('raport.show', $student->username)->with('success', 'Data berhasil diubah');
    }
    // END : Semester 8



    public function destroy(Raport $raport, $id)
    {
        $data = Raport::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Data raport berhasil dihapus!');
    }
}
