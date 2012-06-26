<?
    $dom = simplexml_load_file("lectures.xml");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Lectures</title>
  </head>
  <body>
    <h1>Lectures</h1>
    <ul>
    <?
        foreach ($dom->lecture as $lecture)
        {
            print("<li>");
            print($lecture["number"]);
            print(": ");
            print($lecture->title);
            print("<ul>");
            foreach ($lecture->resources->resource as $resource)
            {
                print("<li>");
                print($resource["name"]);
                print(": ");
                foreach ($resource->format as $format)
                {
                    $path = $format["path"];
                    print("<a href=\"$path\">");
                    print($format["label"]);
                    print("</a>");
                    print(" | ");
                }
                print("</li>");
            }
            print("</ul>");
            print("</li>");
        }
    ?>
    </ul>
  </body>
</html>
