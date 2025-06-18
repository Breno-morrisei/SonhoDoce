<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Produto;
use App\Models\Usuario;
use App\Models\Contato;
    use Illuminate\Support\Facades\Storage;


class AppController extends Controller
{
    //logout
    public function logout() {
    Session::flush();
    return redirect('/');
}
 
    //logar
    public function logar(Request $request){
    $user = Usuario::where('email', $request->email)->first();
 
    if (!$user || !Hash::check($request->senha, $user->senha)) {
        return redirect('/frmlogin');
    }
 
    Session::put('usuario_id', $user->id);
    Session::put('usuario_nome', $user->nome);
 
    return redirect()->action([AppController::class, 'dashboard']);
}
 
   
    //login
    public function frmlogin(){
    return view('frmlogin');
}
 
//método para EXCLUIR mensagem enviada do contato
 
    public function excluircontato($id) {
        if (!session()->has('usuario_id')) {
        return redirect('/frmlogin');
    }
 
    $usuario = Usuario::find(session('usuario_id'));

    $contato = Contato::findOrFail($id);
    $contato->delete();
    return redirect('frmcontatolist')->with('mensagem', 'Contato excluído com sucesso!');
}
 
//método para RESPONDER mensagem enviada do contato
 
public function respondercontato($id) {
    $contato = Contato::findOrFail($id);
    return view('respondercontato', compact('contato'));
}
 
    public function excluirusuario($id){
        if (!session()->has('usuario_id')) {
        return redirect('/frmlogin');
    }
 
    $usuario = Usuario::find(session('usuario_id'));

        $usuario = Usuario::findOrfail($id);
        $usuario->delete();
        return redirect('usuarios');
    }
 
    public function atualizarusuario(Request $request, $id){
        if (!session()->has('usuario_id')) {
        return redirect('/frmlogin');
    }
 
    $usuario = Usuario::find(session('usuario_id'));

            $usuario = Usuario::findOrFail($id);
            $dados = [
                'nome' => $request->fnome,
                'email' => $request->femail
            ];
 
            if(!empty($request->fsenha)){
                $dados['senha'] = Hash::make($request->fsenha);
            }
 
            $usuario->update($dados);
 
            return redirect('usuarios');
 
    }
 
    public function frmeditusuario($id){
        $usuario = Usuario::findOrfail($id);
        return view('frmeditusuario',['user'=>$usuario]);
    }
 
    //SELECT
    public function usuarios(){
        $usuarios = Usuario::all();
        return view('usuarios', ['users'=>$usuarios]);
    }
 
    public function frmusuario(){
        return view ('frmusuario');
    }
 
    //INSERT
public function addusuario(Request $request){
    $usuario = new Usuario();
    $usuario->nome = $request->fnome;
    $usuario->email = $request->femail;
    $usuario->senha = Hash::make($request->fsenha);
    $usuario->save();

    return redirect('/frmlogin')->with('mensagem', 'Usuário cadastrado com sucesso!');
}
 
    public function home(){
        $cards = [
            [
                'imagem' => 'https://claudia.abril.com.br/wp-content/uploads/2020/02/receita-pao-mel-tentacao.jpg?quality=70&strip=info&w=620',
                'nome' => 'Pão de Mel',
                'texto' => 'Delicioso pão de mel artesanal, com massa macia, recheio de doce de leite e cobertura de chocolate. Feito com carinho e ingredientes selecionados para adoçar seu dia!',
                'preco' => 'R$12,00'
            ],
            [
                'imagem' => 'https://catracalivre.com.br/wp-content/uploads/2020/03/trufa-sorvete-limao-catraca.jpg',
                'nome' => 'Trufa',
                'texto' => 'Trufa artesanal com recheio cremoso e cobertura de chocolate nobre. Feita com ingredientes de qualidade para derreter na boca e encantar seu paladar!',
                'preco' => 'R$8,00'
            ],
            [
                'imagem' => 'https://acdn-us.mitiendanube.com/stores/004/551/684/products/cone-de-doce-de-leite-071_site-017bf6793186f681a717199206377029-1024-1024.jpg',
                'nome' => 'Cone Trufado',
                'texto' => 'Cone trufado recheado com creme super cremoso e coberto com chocolate de alta qualidade. Uma explosão de sabor em cada mordida!',
                'preco' => 'R$15,00'
            ],
            [
                'imagem' => 'https://moinhoglobo.com.br/wp-content/uploads/2016/02/51-Brownie-scaled.jpg',
                'nome' => 'Brownie',
                'texto' => 'Brownie artesanal com casquinha crocante e interior macio e chocolatudo. Perfeito para acompanhar um café ou matar aquela vontade de doce!',
                'preco' => 'R$10,00'
            ]
        ];
       
        return view ('home',['card'=> $cards]);
    }
 
    public function sobre(){
 
        $frame = "Laravel";
        $vantagens = ["Sintaxe simples","Sintaxe concisa","Sistema Modular"];
        return view('sobre', ['frm'=>$frame, 'vtg'=>$vantagens]);
    }
 
    public function produtos(){
        $produtos = Produto::all();
        return view('produtos',['prods'=> $produtos]);
    }
 
    public function contato(){
        return view('contato');
    }
 
// Método que processa o formulário
 
public function enviarContato(Request $request) {
    // Validação simples
    $request->validate([
        'nome' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'assunto' => 'required|string|max:255',
        'mensagem' => 'required|string',
    ]);
 
    // Salvar no banco
    Contato::create([
        'nome' => $request->nome,
        'email' => $request->email,
        'assunto' => $request->assunto,
        'mensagem' => $request->mensagem,
    ]);
 
    return redirect('/contato')->with('mensagem', 'Mensagem enviada com sucesso!');
}
 
public function dashboard()
{
    if (!session()->has('usuario_id')) {
        return redirect('/frmlogin');
    }
 
    $usuario = Usuario::find(session('usuario_id'));
 
    return view('dashboard', compact('usuario'));
}
 
    public function frmproduto(){
        return view('frmproduto');
    }
   
    public function addproduto(Request $request){
        if (!session()->has('usuario_id')) {
        return redirect('/frmlogin');
    }
 
    $usuario = Usuario::find(session('usuario_id'));
        $prod = new Produto();
 
        $prod->nome = $request->nome;
        $prod->preco = $request->preco;
        $prod->quantidade = $request->quantidade;
       
        if($request->hasFile('imagem')){
            $path = $request->file('imagem')->store('imagens','public');
            $prod->imagem = $path;
        }
 
        $prod->save();
 
        return redirect('produtos');
    }
  //lista de produtos
    public function frmprodutoslist() {
        if (!session()->has('usuario_id')) {
        return redirect('/frmlogin');
    }
 
    $usuario = Usuario::find(session('usuario_id'));
        
        $produtos = Produto::all();  
        return view('frmprodutoslist', compact('produtos'));
    }
    //pra excluir produto
    public function excluirproduto($id) {
        if (!session()->has('usuario_id')) {
        return redirect('/frmlogin');
    }
 
    $usuario = Usuario::find(session('usuario_id'));

        $produto = Produto::findOrFail($id);
        $produto->delete();
        return redirect('frmprodutoslist');
    }
   
    //editar produto
    public function atualizarproduto(Request $request, $id) {
        if (!session()->has('usuario_id')) {
        return redirect('/frmlogin');
    }
 
    $usuario = Usuario::find(session('usuario_id'));
        
        
        $produto = Produto::findOrFail($id);
 
        $dados = [
            'nome' => $request->fnome,
            'preco' => $request->fpreco
        ];
 
        $produto->update($dados);
 
        return redirect('frmprodutoslist');
    }
 
    public function frmeditproduto($id){
        if (!session()->has('usuario_id')) {
        return redirect('/frmlogin');
    }
 
    $usuario = Usuario::find(session('usuario_id'));

        $produto = Produto::findOrFail($id);
        return view('frmeditproduto', ['produto' => $produto]);
    }
 
     //lista de contato
    public function frmcontatolist() {
        if (!session()->has('usuario_id')) {
        return redirect('/frmlogin');
    }
 
    $usuario = Usuario::find(session('usuario_id'));
        
        $contatos = Contato::all();
        return view('frmcontatolist', compact('contatos'));
    }

}
