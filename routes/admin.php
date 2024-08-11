<?php
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\Auth\VerificationController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\NoticeBoardController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\ShiftController;
use App\Http\Controllers\Admin\ClassSetupController;
use App\Http\Controllers\Admin\SubjectAssignController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\TransactionCategoryController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\BatchController;
use App\Http\Controllers\Admin\MonthlyFeeConfigurationController;
use App\Http\Controllers\Admin\FeesCollectionController;
use App\Http\Controllers\Admin\InstructorController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Bus\Batch;
use Illuminate\Support\Facades\Route;

//admin authentication system
Route::group(['prefix' => 'admin'], function () {
    //admin authentication system
    Route::get('logon', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('logon', [AdminLoginController::class, 'login']);
    Route::post('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('admin.password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('admin.password.update');
    Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');

    Route::group(['middleware' => ['auth:admin','is_branch_selected','prevent-back-history']], function () {
        Route::get('/home', [AdminHomeController::class, 'getDashboard'])->name('admin.dashboard');
        //Profile manage routes
        Route::get('/profile', [AdminHomeController::class, 'view_profile'])->name('admin.profile');
        Route::get('/dashboard', [AdminHomeController::class, 'dashboard'])->name('view.dashboard');
        Route::put('/profile/{id}', [AdminHomeController::class, 'update_general'])->name('update_general');
        Route::post('/profile/password/{id}', [AdminHomeController::class, 'update_password'])->name('admin.update.password');
        //income
        Route::get('/income/create',[\App\Http\Controllers\Admin\IncomeController::class,'create'])->name('income.create');
        Route::get('/income/list',[\App\Http\Controllers\Admin\IncomeController::class,'index'])->name('income.index');
        Route::post('/income/store',[\App\Http\Controllers\Admin\IncomeController::class,'store'])->name('income.store');
        Route::get('/income/edit/{id}',[\App\Http\Controllers\Admin\IncomeController::class,'edit'])->name('income.edit');
        Route::put('/income/update/{id}',[\App\Http\Controllers\Admin\IncomeController::class,'update'])->name('income.update');
        Route::delete('/income/destroy/{id}',[\App\Http\Controllers\Admin\IncomeController::class,'destroy'])->name('income.destroy');
        Route::get('/income/report',[\App\Http\Controllers\Admin\IncomeController::class,'report'])->name('income.report');
        Route::post('/income/getreport',[\App\Http\Controllers\Admin\IncomeController::class,'getreport'])->name('income.getreport');
        Route::get('/income/invoice/{id}',[\App\Http\Controllers\Admin\IncomeController::class,'print'])->name('income.invoice');
        //income category
        Route::get('/income-category/list',[\App\Http\Controllers\Admin\IncomeCategoryController::class,'index'])->name('income_category.index');
        Route::post('/income-category/store',[\App\Http\Controllers\Admin\IncomeCategoryController::class,'store'])->name('income_category.store');
        Route::get('/income-category/edit/{id}',[\App\Http\Controllers\Admin\IncomeCategoryController::class,'edit'])->name('income_category.edit');
        Route::put('/income-category/update/{id}',[\App\Http\Controllers\Admin\IncomeCategoryController::class,'update'])->name('income_category.update');
        Route::delete('/income-category/destroy/{id}',[\App\Http\Controllers\Admin\IncomeCategoryController::class,'destroy'])->name('income_category.destroy');
        //expense
        Route::get('/expense/create',[\App\Http\Controllers\Admin\ExpenseController::class,'create'])->name('expense.create');
        Route::get('/expense/list',[\App\Http\Controllers\Admin\ExpenseController::class,'index'])->name('expense.index');
        Route::post('/expense/store',[\App\Http\Controllers\Admin\ExpenseController::class,'store'])->name('expense.store');
        Route::get('/expense/edit/{id}',[\App\Http\Controllers\Admin\ExpenseController::class,'edit'])->name('expense.edit');
        Route::put('/expense/update/{id}',[\App\Http\Controllers\Admin\ExpenseController::class,'update'])->name('expense.update');
        Route::delete('/expense/destroy/{id}',[\App\Http\Controllers\Admin\ExpenseController::class,'destroy'])->name('expense.destroy');
        Route::get('/expense/report',[\App\Http\Controllers\Admin\ExpenseController::class,'report'])->name('expense.report');
        Route::post('/expense/getreport',[\App\Http\Controllers\Admin\ExpenseController::class,'getreport'])->name('expense.getreport');
        Route::get('/expense/invoice/{id}',[\App\Http\Controllers\Admin\ExpenseController::class,'print'])->name('expense.invoice');
        Route::get('report/profit-loss',[\App\Http\Controllers\Admin\ExpenseController::class,'profit_loss'])->name('report.profit_loss');
        Route::post('report/profit_loss_report',[\App\Http\Controllers\Admin\ExpenseController::class,'profit_loss_report'])->name('report.profit_loss_report');
        //expense category
        Route::get('/expense-category/list',[\App\Http\Controllers\Admin\ExpensecategoryController::class,'index'])->name('expense_category.index');
        Route::post('/expense-category/store',[\App\Http\Controllers\Admin\ExpensecategoryController::class,'store'])->name('expense_category.store');
        Route::get('/expense-category/edit/{id}',[\App\Http\Controllers\Admin\ExpensecategoryController::class,'edit'])->name('expense_category.edit');
        Route::put('/expense-category/update/{id}',[\App\Http\Controllers\Admin\ExpensecategoryController::class,'update'])->name('expense_category.update');
        Route::delete('/expense-category/destroy/{id}',[\App\Http\Controllers\Admin\ExpensecategoryController::class,'destroy'])->name('expense_category.destroy');

        Route::get('/expense-category/list',[\App\Http\Controllers\Admin\ExpensecategoryController::class,'index'])->name('expense_category.index');
        Route::post('/expense-category/store',[\App\Http\Controllers\Admin\ExpensecategoryController::class,'store'])->name('expense_category.store');
        Route::get('/expense-category/edit/{id}',[\App\Http\Controllers\Admin\ExpensecategoryController::class,'edit'])->name('expense_category.edit');
        Route::put('/expense-category/update/{id}',[\App\Http\Controllers\Admin\ExpensecategoryController::class,'update'])->name('expense_category.update');
        Route::delete('/expense-category/destroy/{id}',[\App\Http\Controllers\Admin\ExpensecategoryController::class,'destroy'])->name('expense_category.destroy');
        //class
        Route::resource('classes',ClassController::class);
        Route::get('class_edit',[ClassController::class,'edit']);
        Route::put('class/update/{id}',[ClassController::class,'update']);
        Route::get('classes/delete/{id}', [ClassController::class,'destroy'])->name('classes.delete');
        //class Setup
        Route::get('class-setup',[ClassSetupController::class,'index'])->name('class_settings.index');
        Route::post('class-setup-save',[ClassSetupController::class,'store'])->name('class_settings.store');
        Route::get('class_setup_edit/{branch_id}/{id}',[ClassSetupController::class,'edit']);
        Route::put('class_setup/update/{id}',[ClassSetupController::class,'update']);
        Route::get('class_setup/delete/{id}', [ClassSetupController::class,'destroy'])->name('class_setup.delete');
        //rooms
        Route::resource('rooms',RoomController::class);
        Route::get('room_edit',[RoomController::class,'edit']);
        Route::put('room/update/{id}',[RoomController::class,'update']);
        Route::get('rooms/delete/{id}', [RoomController::class,'destroy'])->name('rooms.delete');
        //branch
        Route::resource('branch',BranchController::class);
        Route::get('branch_edit',[BranchController::class,'edit']);
        // Route::post('/save-branch',[BranchController::class,'store'])->name('branch.store');
        // Route::put('update-branch/{id}', [BranchController::class, 'update']);
        // Route::get('delete-branch/{id}', [BranchController::class, 'destroy']);
        //Section
        Route::get('/academic-section',[SectionController::class,'index'])->name('sections.index');
        Route::post('/save-section',[SectionController::class,'store'])->name('section.store');
        Route::get('section_edit',[SectionController::class,'edit']);
        Route::put('section/update/{id}', [SectionController::class, 'update']);
        Route::get('delete-section/{id}', [SectionController::class, 'destroy']);
        //Batch
        Route::resource('batches',BatchController::class);
        Route::resource('monthly-fees-configurations',MonthlyFeeConfigurationController::class);
        Route::resource('fees-collections',FeesCollectionController::class);
        //shift
        Route::get('/academic-shift',[ShiftController::class,'index'])->name('shifts.index');
        Route::post('/save-shift',[ShiftController::class,'store'])->name('shift.store');
        Route::get('shift_edit',[ShiftController::class,'edit']);
        Route::put('shift/update/{id}', [ShiftController::class, 'update'])->name('update-shift');
        Route::get('delete-shift/{id}', [ShiftController::class, 'destroy']);
        //Subject
        Route::get('/academic-subject',[SubjectController::class,'index'])->name('subjects.index');
        Route::post('/save-subject',[SubjectController::class,'store'])->name('subject.store');
        Route::get('subject_edit',[SubjectController::class,'edit']);
        Route::put('subject/update/{id}', [SubjectController::class, 'update']);
        Route::get('delete-subject/{id}', [SubjectController::class, 'destroy']);
        //Subject Assign
        Route::get('subject-assign',[SubjectAssignController::class,'index'])->name('subject_assign.index');
        Route::post('subject-assign-save',[SubjectAssignController::class,'store'])->name('subject_assign.store');
        Route::get('subject_assign_edit/{branch_id}/{id}',[SubjectAssignController::class,'edit']);
        Route::put('subject_assign/update/{id}',[SubjectAssignController::class,'update']);
        Route::get('subject_assign/delete/{id}', [SubjectAssignController::class,'destroy'])->name('subject_assign.delete');

        // Students
        Route::resource('students',StudentController::class);
        Route::get('get_section',[StudentController::class,'get_section']);
        Route::get('get_student_info',[StudentController::class,'get_student_info']);
        // account_transaction_category
        Route::get('transaction-category',[TransactionCategoryController::class,'index'])->name('transaction_category.index');
        Route::get('transaction-category-create',[TransactionCategoryController::class,'create'])->name('transaction_category.create');
        Route::post('transaction-category-save',[TransactionCategoryController::class,'store'])->name('transaction_category.store');
        Route::get('transaction_category_edit',[TransactionCategoryController::class,'edit']);
        Route::put('transaction_category/update/{id}',[SubjectAssignController::class,'update']);
        Route::get('get_parent',[TransactionCategoryController::class,'get_parent']);

        //instructors
        Route::resource('instructors',InstructorController::class);
        Route::resource('courses',CourseController::class);
        Route::resource('categories',CategoryController::class);

        // Accounts
        Route::resource('accounts',AccountController::class);
        Route::get('get_bank',[AccountController::class,'get_bank']);

        // Transactions
        Route::resource('transactions',TransactionController::class);
        Route::get('expense-transaction',[TransactionController::class,'create_expense'])->name('create_transaction_exepense');
        Route::get('get_tnx_subcat',[TransactionController::class,'tnx_subcat']);

        Route::resource('user', UserController::class);
        Route::resource('roles', RoleController::class);

        Route::get('setting',[SettingController::class, 'setting'])->name('setting');
        Route::post('setting/update',[SettingController::class, 'update_setting'])->name('update_setting');

        Route::get('/contact/message',[\App\Http\Controllers\FrontendController::class, 'contactMessage'])->name('contact.index');
        Route::get('/contact/message/delete/{id}',[\App\Http\Controllers\FrontendController::class, 'messageDelete'])->name('message.delete');
        // notice
        Route::get('/notice/list',[NoticeBoardController::class, 'index'])->name('notice.board.index');
        Route::get('/notice/create',[NoticeBoardController::class, 'create'])->name('notice.board.create');
        Route::post('/notice/store',[NoticeBoardController::class, 'store'])->name('notice.board.store');
        Route::get('/notice/edit/{id}',[NoticeBoardController::class, 'edit'])->name('notice.board.edit');
        Route::post('/notice/update/{id}',[NoticeBoardController::class, 'update'])->name('notice.board.update');
        Route::get('/notice/delete/{id}',[NoticeBoardController::class, 'delete'])->name('notice.board.delete');

    });
});
