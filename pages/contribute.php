<div class="article">
<h1>contribuer</h1>
<p>
At this stage of the project, there is no data-base. All information is kept in xHTML/PHP files which in turn are kept in a Git repository.
<b>In order to contribute, you will need to change the files in the Git repository</b>.
</p>

<p>
We are preparing a way to simplyfy external contributions in the near future.
</p>

<p>
If you already know <a href="https://en.wikipedia.org/wiki/Git_%28software%29">Git</a>, just go to <a href="https://github.com/x42/hminterface">https://github.com/x42/hminterface</a>. Otherwise: read on..
</p>

<h2>Github - Social Coding</h2>
<p>
There are many interfaces around git, in this section we'll concern ourself on using the GitHub web-interface to contribute to the HMI website.
</p>
<ol style="font-weight:bold">
<li>Sign up for a <a href="https://github.com/plans">Free for open source</a> account on github.</li>
<li>Locate the content you want to modify/update.</li>
<li>Edit the content (using the website) and save it (summarize the changes).</li>
<li>Notify us about the change. We will moderate your change, "merge" it and publish it on the website.</li>
</ol>
</p>

<h2> A small Walkthrough</h2>
<p>
We assume you have taken step (1) and have a login on github.com. Surf over to the <a href="https://github.com/x42/hminterface">hminterface project site on github</a>. You'll see a view of the current state of the folder containing this website:
</p>
<div style="text-align:center"><img src="static/img/git/g_hmi1.png" style="width:600px;" /></div>
<p>
Next locate the file you want to update. Pages are below "<tt>pages</tt>", the database-file is "<tt>lib/data.php</tt>"; images are below the "<tt>static</tt>" folder.  This example follows though with editing <tt>pages/contact.php</tt>. You enter the "pages" folder (screenshot above) and will see the file listing of existing pages:
</p>
<div style="text-align:center"><img src="static/img/git/g_hmi2.png" style="width:600px;" /></div>
<p>Next, choose the file to edit. Here: "<tt>contact.php</tt></p>
<div style="text-align:center"><img src="static/img/git/g_hmi3.png" style="width:600px;" /></div>
<p>
You will see the current information in the file. Which is in a XHTML/PHP laguage. More about this below.</p><p>Top right there's a button that allows to you "Fork and edit the file". <em>Forking</em> is used to describe the fact that you make a copy (and edit the copy). The opposite of forking is <em>merging</em>: combining two copies. We will merge your copy after approving approving it.

An example of a fork/merge history may look like this:
</p>
<div style="text-align:center"><img src="static/img/git/g_hmi7.png" style="width:600px;" /></div>
<p>If you click "Fork and edit" you will enter a text-editor:</p>
<div style="text-align:center"><img src="static/img/git/g_hmi4.png" style="width:600px;" /></div>
<p>See below on a quick introduction on the HTML syntax.</p>
<p>
Once done with the update, you should enter a "commit message" - a short informative description of what you did change and then save the changes by pressing the "Propose File Change" button, bottom right. Doing so will take you to the last step: Notify and ask us to include those changes on the real website: You send us a "pull request": we <em>pull</em> your changes and merge them.</p>
<div style="text-align:center"><img src="static/img/git/g_hmi5.png" style="width:600px;" /></div>
<p>Note that after sending a pull request, you can go back to step (2) and edit further files. The changes will be added to the current pull request (until we merge it).</p>
<p>So far for the basics. There are video-tutorials and manual pages on git and github.</p>

<h2>HTML</h2>
<p>An exhaustive introduction on HTML and PHP is out of the scope of this writeup. What you should know however is that HTML is a <em>Markup Language</em>: meaning you mark-up certain parts of the text:</p>
<p> text-paragraphs for example are <em>enclosed in</em> <tt>&lt;p&gt;<tt> tags; headlines in <tt>&lt;h1&gt;<tt> (main headline), <tt>&lt;h2&gt;<tt> (section headline), etc. You need to specify both start tags and end tags, the latter being prefixed with a slash <tt>/</tt>: <tt>&lt;p&gt;<tt>, <tt>&lt;/p&gt;<tt>.
</p>
<p>
Usually you can derive this info from the context (copy, paste, edit existing stanza).
</p>

<p>
A simple example looks like this:
<pre>
 &lt;h1&gt;Headline&lt;/h1&gt;
 &lt;p&gt;A paragraph of text.&lt;/p&gt;
 &lt;p&gt;Another text paragraph.&lt;/p&gt;
</pre>

</div>

