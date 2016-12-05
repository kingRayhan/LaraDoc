<article class="doc-body">
        <h1>Installation</h1>
<ul>
<li><a href="#installation">Installation</a>
<ul>
<li><a href="#server-requirements">Server Requirements</a></li>
<li><a href="#installing-laravel">Installing Laravel</a></li>
<li><a href="#configuration">Configuration</a></li>
</ul></li>
</ul>
<p><a name="installation"></a></p>
<h2><a href="#installation">Installation</a></h2>
<p><a name="server-requirements"></a></p>
<h3>Server Requirements</h3>
<p>The Laravel framework has a few system requirements. Of course, all of these requirements are satisfied by the <a href="/docs/5.3/homestead">Laravel Homestead</a> virtual machine, so it's highly recommended that you use Homestead as your local Laravel development environment.</p>
<p>However, if you are not using Homestead, you will need to make sure your server meets the following requirements:</p>
<div class="content-list">
<ul>
<li>PHP &gt;= 5.6.4</li>
<li>OpenSSL PHP Extension</li>
<li>PDO PHP Extension</li>
<li>Mbstring PHP Extension</li>
<li>Tokenizer PHP Extension</li>
<li>XML PHP Extension</li>
</ul>
</div>
<p><a name="installing-laravel"></a></p>
<h3>Installing Laravel</h3>
<p>Laravel utilizes <a href="https://getcomposer.org">Composer</a> to manage its dependencies. So, before using Laravel, make sure you have Composer installed on your machine.</p>
<h4>Via Laravel Installer</h4>
<p>First, download the Laravel installer using Composer:</p>
<pre class=" language-php"><code class=" language-php">composer <span class="token keyword">global</span> <span class="token keyword">require</span> <span class="token string">"laravel/installer"</span></code></pre>
<p>Make sure to place the <code class=" language-php"><span class="token variable">$HOME</span><span class="token operator">/</span><span class="token punctuation">.</span>composer<span class="token operator">/</span>vendor<span class="token operator">/</span>bin</code> directory (or the equivalent directory for your OS) in your $PATH so the <code class=" language-php">laravel</code> executable can be located by your system.</p>
<p>Once installed, the <code class=" language-php">laravel <span class="token keyword">new</span></code> command will create a fresh Laravel installation in the directory you specify. For instance, <code class=" language-php">laravel <span class="token keyword">new</span> <span class="token class-name">blog</span></code> will create a directory named <code class=" language-php">blog</code> containing a fresh Laravel installation with all of Laravel's dependencies already installed:</p>
<pre class=" language-php"><code class=" language-php">laravel <span class="token keyword">new</span> <span class="token class-name">blog</span></code></pre>
<h4>Via Composer Create-Project</h4>
<p>Alternatively, you may also install Laravel by issuing the Composer <code class=" language-php">create<span class="token operator">-</span>project</code> command in your terminal:</p>
<pre class=" language-php"><code class=" language-php">composer create<span class="token operator">-</span>project <span class="token operator">--</span>prefer<span class="token operator">-</span>dist laravel<span class="token operator">/</span>laravel blog</code></pre>
<h4>Local Development Server</h4>
<p>If you have PHP installed locally and you would like to use PHP's built-in development server to serve your application, you may use the <code class=" language-php">serve</code> Artisan command. This command will start a development server at <code class=" language-php">http<span class="token punctuation">:</span><span class="token operator">/</span><span class="token operator">/</span>localhost<span class="token punctuation">:</span><span class="token number">8000</span></code>:</p>
<pre class=" language-php"><code class=" language-php">php artisan serve</code></pre>
<p>Of course, more robust local development options are available via <a href="/docs/5.3/homestead">Homestead</a> and <a href="/docs/5.3/valet">Valet</a>.</p>
<p><a name="configuration"></a></p>
<h3>Configuration</h3>
<h4>Public Directory</h4>
<p>After installing Laravel, you should configure your web server's document / web root to be the <code class=" language-php"><span class="token keyword">public</span></code> directory. The <code class=" language-php">index<span class="token punctuation">.</span>php</code> in this directory serves as the front controller for all HTTP requests entering your application.</p>
<h4>Configuration Files</h4>
<p>All of the configuration files for the Laravel framework are stored in the <code class=" language-php">config</code> directory. Each option is documented, so feel free to look through the files and get familiar with the options available to you.</p>
<h4>Directory Permissions</h4>
<p>After installing Laravel, you may need to configure some permissions. Directories within the <code class=" language-php">storage</code> and the <code class=" language-php">bootstrap<span class="token operator">/</span>cache</code> directories should be writable by your web server or Laravel will not run. If you are using the <a href="/docs/5.3/homestead">Homestead</a> virtual machine, these permissions should already be set.</p>
<h4>Application Key</h4>
<p>The next thing you should do after installing Laravel is set your application key to a random string. If you installed Laravel via Composer or the Laravel installer, this key has already been set for you by the <code class=" language-php">php artisan key<span class="token punctuation">:</span>generate</code> command.</p>
<p>Typically, this string should be 32 characters long. The key can be set in the <code class=" language-php"><span class="token punctuation">.</span>env</code> environment file. If you have not renamed the <code class=" language-php"><span class="token punctuation">.</span>env<span class="token punctuation">.</span>example</code> file to <code class=" language-php"><span class="token punctuation">.</span>env</code>, you should do that now. <strong>If the application key is not set, your user sessions and other encrypted data will not be secure!</strong></p>
<h4>Additional Configuration</h4>
<p>Laravel needs almost no other configuration out of the box. You are free to get started developing! However, you may wish to review the <code class=" language-php">config<span class="token operator">/</span>app<span class="token punctuation">.</span>php</code> file and its documentation. It contains several options such as <code class=" language-php">timezone</code> and <code class=" language-php">locale</code> that you may wish to change according to your application.</p>
<p>You may also want to configure a few additional components of Laravel, such as:</p>
<div class="content-list">
<ul>
<li><a href="/docs/5.3/cache#configuration">Cache</a></li>
<li><a href="/docs/5.3/database#configuration">Database</a></li>
<li><a href="/docs/5.3/session#configuration">Session</a></li>
</ul>
</div>
<p>Once Laravel is installed, you should also <a href="/docs/5.3/configuration#environment-configuration">configure your local environment</a>.</p>
    </article>
