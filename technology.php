<?php include('_partials/header.php'); ?>
<body class="contained fixed-nav">
  <?php include('_partials/nav.php'); ?>
  <main>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1>Here comes Technology</h1>
  				<h2>Technology used</h2>
          <ul>
            <li>PHP</li>
            <li>Javascript and CSS (<a href="https://getbootstrap.com/" target="_blank">Bootstrap</a>, <a href="https://github.com/acdh-oeaw/fundament" target="_blank">Fundament</a>)</li>
          </ul>
          <p>This simple DIY project only consisits of several PHP files. It is manually written without a PHP framework!</p>
          <p>Why? It is developed by a novice developer who only knows basic PHP, Javascript and CSS, which are relatively easy to learn for beginners. Don't be afraid of coding!</p>
          <h2>What is Linked Data?</h2>
          <p> With Linked Data, we aim to create links between data, especially on the web. As you know, millions of websites or web documents are interlinked, but Linked Data specialises in "raw data".
            For example, instead of linking a website of Tokyo to a website of Shibuya (an area in Tokyo), Linked Data is desgined to create links between Tokyo and New York as entities. In addition, Linked Data provides a way to describe a type of links. For example, we can say &lt;Shibuya&gt;&lt;isPartOf&gt;&lt;Tokyo&gt;.
            In this way, we can talk more about specific things about two entities. This is not possible for the current website links, because they only gives you the information about the direction of links: from website A to website B (i.e. &lt;a href=""&gt; in <a href="https://en.wikipedia.org/wiki/HTML" target="_blank">HTML</a>) </p>
          <p>This example of Tokyo and Shibuya is actually a sentence (Subject-Predicate-Object), which represents the essence of the Linked Data concept, called <a href="https://en.wikipedia.org/wiki/Resource_Description_Framework" target="_blank">Resource Description Framework (RDF)</a>. Shibuya (subject) is linked to Tokyo (object) by isPartOf (predicate).
            It is also called graph (or <a href="https://en.wikipedia.org/wiki/Directed_graph" target="_blank">directed graph</a>), because there is a direction of the Subject-Object link in this sentence: from Shibuya to Tokyo, not the other way around. RDF is a graph.
            You may wonder how Shibuya and Tokyo can be linked without websites. In Linked Data, we use <a href="https://en.wikipedia.org/wiki/Uniform_Resource_Identifier" target="_blank">Uniform Resource Identifier (URI)</a> to identify entities. For example, while there is a URI for Shibuya (https://www.wikidata.org/entity/Q193638.rdf), Shibuya is identified as https://www.wikidata.org/entity/Q7473516.rdf.
            So, the actual Linked Data should look like
          </p>
          <p>&lt;https://www.wikidata.org/entity/Q7473516.rdf&gt;&lt;dcterms:isPartOf&gt;&lt;https://www.wikidata.org/entity/Q193638.rdf&gt;
          </p>
          <p>
            URI looks like <a href="https://en.wikipedia.org/wiki/URL" target="_blank">Uniform Resource Locator (URL)</a> (i.e. web address), but it is not mandatory to be accessible on the web (it would be better to be accessible). The basic difference betweeen URL and URI is that the former is used for access and the latter is for identification. But, URI is a broader concept than URL, thus, URL is a part/type of URI. It means URI can be functioned as URL, if you wish. It is also better if URI is widely known and shared, because we can be sure
            we talk about the same thing. The benefit of this "entity linking" rather than "website/document linking" is we can more easily process raw data (in particular, automatically by computers), because the data format is standardised. Consequently, we can ask a lot about Tokyo: the population, coordinates,
            famous people from the city, and events in history. In addition, if we create links in the dataset of Tokyo to Shibuya, we can get more related information about Toyko: what is the population of Shibuya and where is Shibuya located in Tokyo? As a result, we can develop a software to help our life. It can answer your questions, or take actions for you. In future you may be able to ask, for example, please generate a report about
            the statistics of tourism in Tokyo from 2000 and 2017, divided by the district in Tokyo, grouped and sorted by the origins of tourists. Or, you may ask computer to play all the songs by date, which are composed by a guitarist of a band X, but only during the time when the guitarist lived in the USA. Why?
            Because raw data are in the standardised and sentence-like format (RDF) and published like a big big global database, so you can search them. This dream scenario is called <a href="https://en.wikipedia.org/wiki/Semantic_Web" target="_blank">Semantic Web</a>, which <a href="https://en.wikipedia.org/wiki/Tim_Berners-Lee" target="_blank">the inventor of World Wide Web</a> has been proposing and promoting. Great!
          </p>
          <p>
          You can read Wikipedia's explanation on <a href="https://en.wikipedia.org/wiki/Linked_data" target="_blank">Linked Data</a>, or at <a href="https://www.w3.org/standards/semanticweb/data" target="_blank">a more technical website</a>.
          If you prefer video clips, <a href="https://www.youtube.com/watch?v=4x_xzT5eF5Q" target="_blank">"What is Linked Data?"</a> and <a href="https://vimeo.com/36752317" target="_blank">"Linked Open Data - What is it?"</a> may be handy.
          Linked Open Data (LOD) is a Linked Data with <a href="https://en.wikipedia.org/wiki/Free_license" target="_blank">Open Licenses</a>, which allows freedoms for the users.
          The three components of Linked Data are:
            <ul>
              <li><a href="https://en.wikipedia.org/wiki/Resource_Description_Framework" target="_blank">Resource Description Framework (RDF)</a></li>
              <li><a href="https://en.wikipedia.org/wiki/Uniform_Resource_Identifier" target="_blank">Uniform Resource Identifier (URI)</a></li>
              <li><a href="https://en.wikipedia.org/wiki/Hypertext_Transfer_Protocol" target="_blank">HyperText Transfer Protocol (HTTP)</a></li>
            </ul>
          </p>
          <h2>Deep Traversing</h2>

  				<h2>Slow performance</h2>
  				<p>Due to the deep traversals of a large Linked Open Data datasets, the query performance is rather slow.
  				Unfortunately, there is not much we can do about it, as this application totally depends on the amount of links and data found in LOD.
          Imagine how many LOD need to be visited when 1 link contains n number of links, which contain n number of links. When n is multiplied by n, the number would become exponential.
          To prevent this, the number of traversals is limited to five, so that the traversals are somehow manageable for the time being. In addition, we do not visit the same URI twice.
          There are often duplicated URIs, so the removal of duplication significantly reduces the links to be followed.
          In a way, it is similar to the situation where complex SPARQL queries are often slow. On the other hand, we have also proved that the current API set-ups could be a bottle neck for
  				serious implementation of distributed data-centric research for Digital Humanities. We need to wait for faster Internet infrastructure. Let's hope the situation will become better in the near future!
          </p>
          <p>Data are only displayed and no data are stored in our servers.</p>
          <h2>Future Work</h2>
          <p>As this is an experimental project, there are a wish list. It is hoped to provide more functionalities in the future:</p>
          <ul>
            <li>Graph/network view of the traversals to see the overview</li>
            <li>Statistical visualisation of the traversals, using pie charts, bar charts etc to anaylse them</li>
            <li>Useful output in different formats (download, JSON, save as image etc)</li>
          </ul>
        </div>
      </div>
    </div><!-- /container -->
  </main>
  <?php include('_partials/footer.php'); ?>
