{{$coinData['coinName']}}

<select name="{{$coinData['coinID']}}">
    <option value="No Grade" selected="selected">No Grade </option>
@switch($coinData['strike'])
    @case('Business')

    <option value="B0">B-0</option>
    <option value="P1" >PO-1</option>
    <option value="FR2">FR-2</option>
    <option value="AG3">AG-3</option>
    <option value="G4">G-4</option>
    <option value="G6">G-6</option>
    <option value="VG8">VG-8</option>
    <option value="VG10">VG-10</option>
    <option value="F12">F-12</option>
    <option value="F15">F-15</option>
    <option value="VF20">VF-20</option>
    <option value="VF25">VF-25</option>
    <option value="VF30">VF-30</option>
    <option value="VF35">VF-35</option>
    <option value="EF40">EF-40</option>
    <option value="EF45">EF-45</option>
    <option value="AU50">AU-50</option>
    <option value="AU55">AU-55</option>
    <option value="AU58">AU-58</option>
    <option value="MS60">MS-60</option>
    <option value="MS61">MS-61</option>
    <option value="MS62">MS-62</option>
    <option value="MS63">MS-63</option>
    <option value="MS64">MS-64</option>
    <option value="MS65">MS-65</option>
    <option value="MS66">MS-66</option>
    <option value="MS67">MS-67</option>
    <option value="MS68">MS-68</option>
    <option value="MS69">MS-69</option>
    <option value="MS70">MS-70</option>
    </select>
    @break

    @case('Proof')
<option value="PR35">PR-35</option>
<option value="PR40">PR-40</option>
<option value="PR45">PR-45</option>
<option value="PR50">PR-50</option>
<option value="PR55">PR-55</option>
<option value="PR58">PR-58</option>
<option value="PR60">PR-60</option>
<option value="PR61">PR-61</option>
<option value="PR62">PR-62</option>
<option value="PR63">PR-63</option>
<option value="PR64">PR-64</option>
<option value="PR65">PR-65</option>
<option value="PR66">PR-66</option>
<option value="PR67">PR-67</option>
<option value="PR68">PR-68</option>
<option value="PR69">PR-69</option>
<option value="PR70">PR-70</option>
    @break

    @default
<option value="MS65">MS-65</option>
@endswitch

</select>
